<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Получение времени начала олимпиады
     * @return JsonResponse
     */
    public function getStartDate(): JsonResponse
    {
        $startQuiz = (new Quiz())->startQuiz;
        $current = now();
        return response()->json([
            'start' => $this->getJSDateArray($startQuiz),
            'current' => $this->getJSDateArray($current),
        ]);
    }

    /**
     * Получение времени окончания олимпиады
     * @return JsonResponse
     */
    public function getEndDate(): JsonResponse
    {
        $endQuiz = (new Quiz())->endQuiz;
        $current = now();
        return response()->json([
            'start' => $this->getJSDateArray($endQuiz),
            'current' => $this->getJSDateArray($current),
        ]);
    }

    /**
     * Формирование массива для даты в JS
     * @param  Carbon  $date
     * @return array
     */
    private function getJSDateArray(Carbon $date): array
    {
        return [
            'y' => $date->year,
            'm' => $date->month - 1,
            'd' => $date->day,
            'h' => $date->hour,
            'i' => $date->minute,
            's' => $date->second,
        ];
    }

    /**
     * Сохранение ответа при изменении
     * @param  Request  $request
     * @return void
     */
    public function saveAnswer(Request $request): void
    {
        $data = Auth::user()->order->quiz1->data;
        $question = $request->question;
        $answer = $request->answer;
        $data->firstWhere('question_id', $question)->update([
            'answer_id' => $answer
        ]);
    }

    /**
     * Сохранение ответа во второй части олимпиады
     * @param  Request  $request
     * @return void
     */
    public function savePart2(Request $request): void
    {
        $data = Auth::user()->order->quiz1->data2;
        $name = $request->name;
        $answer = $request->answer;
        $data->update([
            $name => $answer
        ]);
    }

    /**
     * Сохранение результатов олимпиады
     * @return JsonResponse
     */
    public function saveQuiz(): JsonResponse
    {
        $now = now();
        $quiz = Auth::user()->order->quiz1;
        $quiz->update([
            'end' => $now,
        ]);
        $data = $quiz->data();
        $data2 = $quiz->data2();
        $data->whereNotNull('answer_id')->whereNull('end')
            ->update([
                'end' => $now,
            ]);
        $data2->update([
            'videoEnd' => $now,
            'sightEnd' => $now
        ]);

        return response()->json(route('quiz.end'));
    }

    public function agreement()
    {
        $quiz = Auth::user()->order->quiz1;
        $quiz->update([
            'agreement' => true
        ]);
    }
}
