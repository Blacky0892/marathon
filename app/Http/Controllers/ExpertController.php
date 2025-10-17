<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Nomination;
use App\Models\Order;
use App\Models\Value;
use Blacky0892\LaravelDatatables\DataTable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ExpertController extends Controller
{
    /**
     * Просмотр страницы со списком заявок в номинации
     * @param  Nomination  $nomination
     * @return View|RedirectResponse
     */
    public function viewNomination(Nomination $nomination): View|RedirectResponse
    {
        $this->checkNomination($nomination);
        $active = "nom-$nomination->slug";
        $nominations = Nomination::all();

        return view('expert.nomination', compact('active', 'nomination', 'nominations'));
    }

    /**
     * Проверка, что у эксперта есть доступ к номинации
     * @param  Nomination  $nomination
     * @return void
     */
    private function checkNomination(Nomination $nomination): void
    {
        if (!Auth::user()->nominations->contains($nomination)) {
            redirect()->route('home');
        }
    }

    /**
     * Получение таблицы для конкретной номинации
     * @param  Request  $request
     * @param  Nomination  $nomination
     * @return Response
     */
    public function getNomination(Request $request, Nomination $nomination): Response
    {
        $user     = Auth::user();
        $table    = new DataTable($request, Order::class);
        $table->records->with(['values', 'area']);

        $this->getNominationsIds($table, $user, $nomination->slug);

        $table->setTotalCount();

        // Применяем сортировку
        switch ($table->getColumnName()) {
            case 'school':

                break;
            case 'value':
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

        $records = $table->getRecords();

        $data = [];

        foreach ($records as $record) {
            if (is_null($record->values)) {
                $values = null;
            } else {
                $expertValue = $record->values
                    ->where('user_id', Auth::id())->first();
                if (is_null($expertValue)) {
                    $values = null;
                } else {
                    $values = $expertValue->values;
                }
            }

            if (empty($values) || is_null($values)) {
                $value = 'Нет оценки';
            } else {
                $value = round(array_sum($values) / count($values), 2);
            }
            $data[] = [
                'id'     => $record->id,
                'school' => $record->school->short_name,
                'value'  => $value,
                'link'   => route('expert.nomination.value', [$nomination->slug, $record->id]),
            ];
        }

        return response($table->getDTResponse($data));
    }

    /**
     * Страница с заявкой в конкретной номинации
     * @param  Nomination  $nomination
     * @param  Order  $order
     * @return View
     */
    public function valueNomination(Nomination $nomination, Order $order): View
    {
        $this->checkNomination($nomination);
        $active    = "nom-$nomination->slug";
        $criterias = Criteria::all();

        $value  = Value::
            where('order_id', $order->id)
            ->where('user_id', Auth::id())
            ->first();
        $values = null;
        if (!is_null($value)) {
            $values = $value->values;
        }
        $nominations = Nomination::all();

        return view('expert.nominationValue', compact('order','active', 'nomination', 'order', 'criterias', 'values', 'nominations'));
    }

    /**
     * Сохранение оценок для заявки
     * @param  Request  $request
     * @param  Nomination  $nomination
     * @param  Order  $order
     * @return RedirectResponse
     */
    public function storeValueNomination(Request $request, Nomination $nomination, Order $order): RedirectResponse
    {
        $this->checkNomination($nomination);
        $value      = Value::
            where('order_id', $order->id)
            ->where('user_id', Auth::id())
            ->first();
        $values     = $request->except('_token');
        $valuesJson = [];
        array_map(function ($key, $value) use (&$valuesJson) {
            $key              = str_replace('value-', '', $key);
            $valuesJson[$key] = $value;
        }, array_keys($values), $values);

        if (is_null($value)) {
            Value::create([
                'order_id'      => $order->id,
                'user_id'       => Auth::id(),
                'values'        => $valuesJson,
            ]);
        } else {
            $value->update([
                'values' => $valuesJson,
            ]);
        }

        return redirect()->route('expert.nomination', $nomination->slug);
    }



    private function getNominationsIds(&$table, $user, $type)
    {
        $programs = $user->programs()->where('type',$type)->select('order_id')->pluck('order_id')->toArray();
        $table->records->whereIn('id', $programs);
    }
}
