<?php

namespace App\Http\Controllers;

use App\Exports\QuizExport;
use App\Exports\Stage1Export;
use App\Exports\Stage2Export;
use App\Exports\UsersExport;
use App\Exports\ValueExport;
use App\Models\Criteria;
use App\Models\Nomination;
use App\Models\Order;
use App\Models\Program;
use App\Models\QuizQuestion;
use App\Models\User;
use App\Models\Value;
use Blacky0892\LaravelDatatables\DataTable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ModeratorController extends Controller
{
    public function orders()
    {
        $nominations = Nomination::all();
        $active = 'orders';
        return view('moderator.home', compact('nominations', 'active'));
    }

    /**
     * Таблица с заявками
     * @param  Request  $request
     * @return Response
     */
    public function ordersTable(Request $request): Response
    {
        $table = new DataTable($request, User::class);
        $table->records->whereHas('roles', function ($role){
            $role->where('slug', 'user');
        });
        $table->setTotalCount();

        $table->records->with(['school.area']);

        // Применяем сортировку
        switch ($table->getColumnName()) {
            //case 'name':
                //$table->sortWithJoin('users', 'user_id', 'name');
                //break;

            default:
                $table->simpleSort();
                break;
        }

        // Поиск по ФИО или ОО
        if ($table->getSearchValue()) {
            $table->records = $table->records->whereHas('school', function ($school) use ($table) {
                $school->where('name', 'like', '%'.$table->getSearchValue().'%');
            })
                ->orWhere('name', 'like', '%'.$table->getSearchValue().'%');
            $table->setIsFilter();
        }

        $records = $table->getRecords();

        $data = [];

        foreach ($records as $record) {
            $data[] = [
                'id'     => $record->id,
                'name'   => $record->name,
                'school' => $record->school->short_name ?? null,
                //'status' => $record->status,
                'link'   => route('moderator.order.view', $record->id),
            ];
        }

        return response($table->getDTResponse($data));
    }


    /**
     * Просмотр заявки
     * @param  Order  $order
     * @return View
     */
    public function viewOrder(User $order): View
    {
        $nominations = Nomination::all();
        $order->load('school.area');

        return view('moderator.order', compact('order', 'nominations'));
    }

    public function stage($stage)
    {
        $nominations = Nomination::all();
        $active = 'stage-'.$stage;

        return view('moderator.stage', compact('nominations', 'stage', 'active'));
    }

    public function stageTable(Request $request, $stage): Response
    {
        $table = new DataTable($request, Order::class);
        $table->records->where('stage', $stage);
        $table->setTotalCount();

        $table->records->with(['school.area']);

        // Применяем сортировку
        switch ($table->getColumnName()) {
            //case 'name':
            //$table->sortWithJoin('users', 'user_id', 'name');
            //break;
            case 'school':
                $table->records->leftJoin('schools', 'orders.school_id', 'schools.id');
                $table->records->orderBy('schools.short_name', $table->getColumnSortOrder())
                    ->select('orders.*', 'schools.short_name as orderField');
                break;
            default:
                $table->simpleSort();
                break;
        }

        // Поиск по ФИО или ОО
        if ($table->getSearchValue()) {
            $table->records = $table->records->whereHas('user', function ($user) use ($table) {
                $user->where('name', 'like', '%'.$table->getSearchValue().'%');
            })
                ->orWhereHas('school', function ($school) use ($table) {
                    $value = $table->getSearchValue();
                    $school->where('name', 'like', '%'.$value.'%');
                });
            $table->setIsFilter();
        }

        $records = $table->getRecords();

        $data = [];

        foreach ($records as $record) {
            $data[] = [
                'id'     => $record->id,
                'name'   => $record->user->name,
                'school' => $record->school->short_name ?? null,
                //'status' => $record->status,
                'link'   => $record->link,
            ];
        }

        return response($table->getDTResponse($data));
    }

    /**
     * Экспорт данных
     * @param  string  $type
     * @return BinaryFileResponse|void
     */
    public function export(string $type)
    {
        $date          = now();
        $formattedDate = $date->format('d.m.Y');

        switch ($type){
            case 'orders':
                return Excel::download(new UsersExport($date), 'Выгрузка заявок от '.$formattedDate.'.xlsx');
            case 'stage-1':
                return Excel::download(new Stage1Export($date), 'Выгрузка 1 этапа от '.$formattedDate.'.xlsx');
            case 'stage-2':
                return Excel::download(new Stage2Export($date), 'Выгрузка 2 этапа от '.$formattedDate.'.xlsx');
            default:
                $name = Nomination::firstWhere('slug', $type)->name;

                return Excel::download(new ValueExport($date, $type),
                    'Выгрузка оценок - '.$name.' - от '.$formattedDate.'.xlsx');
        }

    }

    /**
     * Просмотр номинации
     * @param  Nomination  $nomination
     * @return View|RedirectResponse
     */
    public function viewNomination(Nomination $nomination): View|RedirectResponse
    {
        $active      = "nom-$nomination->slug";
        $nominations = Nomination::all();

        return view('moderator.nomination', compact('active', 'nomination', 'nominations'));
    }

    /**
     * Получение таблицы с участниками в определенной номинации
     * @param  Request  $request
     * @param  Nomination  $nomination
     * @return Response
     */
    public function getNomination(Request $request, Nomination $nomination): Response
    {
        $ids = Program::select('order_id')->get()->pluck('order_id')->toArray();
        $table = new DataTable($request, Order::class);
        $table->records->with(['values', 'area']);
        $table->records->whereIn('orders.id', $ids);
        $select = 'orders.id, orders.school_id, orders.mrsd, orders.area_id';
        $table->records->leftJoin('values as v', 'v.order_id', '=', 'orders.id');
        $criterias = Criteria::all();
        $field     = 'sum(';
        $i         = 1;
        $count     = $criterias->count();
        foreach ($criterias as $criteria) {
            $field .= "JSON_EXTRACT(`v`.`values`, '$.\"$criteria->id\"')";
            if ($i < $count) {
                $field .= " + ";
            }
            $i++;
        }
        $field2 = $field . ") / $count / ";

        #$experts = $nomination->slug === 'program' ? 2 : $nomination->experts()->count();
        $experts = 1;
        $field2  .= "$experts as v2";
        $field   .= ') as v1';
        $select  .= ", $field, $field2";
        $table->records->select(DB::raw($select));


        // Применяем сортировку
        switch ($table->getColumnName()) {
            case 'area':
                $table->sortWithJoin('areas', 'area_id', 'short_name');
                break;
            case 'school':
                $table->sortWithJoin('schools', 'school_id', 'short_name');
                break;
            case 'value':
                $table->records->orderBy(DB::raw('v1'), $table->getColumnSortOrder());
                break;
            default:
                $table->simpleSort();
                break;
        }

        // Поиск по ФИО или ОО
        if ($table->getSearchValue()) {
            $table->records->join('schools', 'orders.school_id', 'schools.id');
            $table->records->where('schools.short_name', 'like', "%{$table->getSearchValue()}%");
            $table->setIsFilter();
        }
        $table->records->groupBy(['orders.id', 'orders.school_id', 'orders.mrsd', 'orders.area_id']);
        $table->setTotalCount();

        $records = $table->getRecords();

        $data = [];

        foreach ($records as $record) {
            $data[] = [
                'id'        => $record->id,
                'mrsd'      => $record->mrsd,
                'area'      => $record->area->short_name ?? '',
                'school'    => $record->school->short_name ?? '',
                'value'     => $record->v2 ? round($record->v2, 2) : 'Нет оценки',
                'valueFull' => $record->v1 ?? 'Нет оценки',
                'link'      => route('moderator.nomination.view', [$nomination->slug, $record->id]),
            ];
        }

        return response($table->getDTResponse($data));
    }

    /**
     * Просмотр оценок участника в определенной номинации
     * @param  Nomination  $nomination
     * @param  Order  $order
     * @return View
     */
    public function viewNominationValues(Nomination $nomination, Order $order): View
    {
        $active      = "nom-$nomination->slug";
        $criterias   = Criteria::all();
        $nominations = Nomination::all();

        $values  = Value::
            where('order_id', $order->id)
            ->get();
        $experts = User::whereHas('roles', function ($role) {
            $role->where('slug', 'expert');
        })
            ->whereHas('nominations', function ($nom) use ($nomination) {
                $nom->where('slug', $nomination->slug);
            });
        $type = $nomination->slug === 'host' ? 'program' : $nomination->slug;

        $expertIds = Program::select('user_id')->where('order_id', $order->id)->where('type', $type)->pluck('user_id')->toArray();
        $experts->whereIn('id', $expertIds);
        $experts = $experts->get();

        return view('moderator.nominationValue',
            compact('active', 'nomination', 'order', 'criterias', 'values', 'nominations', 'experts'));
    }

    /**
     * Обновление оценок
     * @param  Request  $request
     * @param  Order  $order
     * @param  Nomination  $nomination
     * @return RedirectResponse
     */
    public function updateValues(Request $request, Order $order, Nomination $nomination): RedirectResponse
    {
        $experts = [];
        foreach ($request->except(['_token', '_method']) as $key => $value) {
            $expert                    = $this->getStringBetween($key, 'expert-', '-value');
            $option                    = $this->getStringBetween($key, '-value-', '-end');
            $experts[$expert][$option] = $value;
        }
        foreach ($experts as $expert => $valueJSON) {
            $value = Value::where('order_id', $order->id)
                ->where('user_id', $expert)
                ->first();

            if (is_null($value)) {
                Value::create([
                    'order_id'      => $order->id,
                    'user_id'       => $expert,
                    'values'        => $valueJSON,
                ]);
            } else {
                $value->update([
                    'values' => $valueJSON,
                ]);
            }
        }

        return redirect()->route('moderator.nomination.view', [$nomination->slug, $order->id]);
    }

    private function getStringBetween($string, $start, $end): string
    {
        $string = ' '.$string;
        $ini    = strpos($string, $start);
        if ($ini == 0) {
            return '';
        }
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;

        return substr($string, $ini, $len);
    }

}
