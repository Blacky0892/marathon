<?php

use App\Http\Controllers\Api\QuizController;
use App\Http\Controllers\Api\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Поиск школы по названию
Route::get('schools/search', [SearchController::class, 'searchSchool']);
// Загрузка информации о школе
Route::get('schools/info/{school}', [SearchController::class, 'getInfoById']);

// Получение информации о времени начала олимпиады
Route::get('quiz/start', [QuizController::class, 'getStartDate']);
// Получение информации о времени окончания олимпиады
Route::get('quiz/end', [QuizController::class, 'getEndDate']);
// Сохранение информации об ознакомлении с инструкцией
Route::post('quiz/agreement', [QuizController::class, 'agreement']);

// Сохранение ответов 1 части
Route::post('quiz/saveAnswer', [QuizController::class, 'saveAnswer']);
// Сохранение ответов 2 части
Route::post('quiz/savePart2', [QuizController::class, 'savePart2']);
// Сохранение результатов
Route::post('quiz/end', [QuizController::class, 'saveQuiz']);
