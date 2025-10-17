<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Удаление файла
     * @param  Order  $order
     * @param  string  $name
     * @return bool
     */
    public function deleteFile(Order $order, string $name): bool
    {
        $path = 'public/'.$order->$name;
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
        $order->update([
            $name => null,
        ]);

        return true;
    }

    /**
     * Обновление заявки
     * @param  OrderRequest  $request
     * @param  Order  $order
     * @return RedirectResponse
     */
    public function update(OrderRequest $request, Order $order): RedirectResponse
    {
        $updates = [
            'poster'  => $request->poster ?? $order->poster,
            'poster_link'  => $request->poster_link ?? $order->poster_link,
            'trailer'      => $request->trailer ?? $order->trailer,
            'trailer_link' => $request->trailer_link ?? $order->trailer_link,
            'program'      => $request->program ?? $order->program,
            'program_reportage'      => $request->program_reportage ?? $order->program_reportage,
            'is_host'      => $request->is_host ?? $order->is_host,
            'video'        => $request->video ?? $order->video,
            'video_link'        => $request->video_link ?? $order->video_link,
        ];

        if (!is_null($request->file('order'))) {
            $updates['order'] = $this->storeFile($order, $request->order, 'order');
        }
        if (!is_null($request->file('application'))) {
            $updates['application'] = $this->storeFile($order, $request->application, 'application');
        }
        /*if (!is_null($request->file('poster'))) {
            $updates['poster'] = $this->storeFile($order, $request->poster, 'poster');
        }*/
        if (!is_null($request->file('route'))) {
            $updates['route'] = $this->storeFile($order, $request->route, 'route');
        }
        if (!is_null($request->file('quiz'))) {
            $updates['quiz'] = $this->storeFile($order, $request->quiz, 'quiz');
        }

        $order->update($updates);

        return redirect()->route('home')->with(['notify_success' => 'Заявка успешно обновлена']);
    }

    /**
     * Сохранение файла
     * @param  Order  $order
     * @param $file
     * @param  string  $name
     * @return string
     */
    private function storeFile(Order $order, $file, string $name): string
    {
        $fileName = $name.'_'.$order->id.'_'.md5(time()).'.'.$file->getClientOriginalExtension();

        return $file->storeAs('orders/'.$order->id, $fileName, 'public');
    }
}
