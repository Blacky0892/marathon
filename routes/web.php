<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Роуты для авторизации
Route::as('auth.')->middleware('guest')->group(function () {
    // Страница авторизации
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    // Авторизация
    Route::post('login', [LoginController::class, 'login'])->name('login.process');
    // Страница "Забыл пароль"
    Route::get('password/forgot', [ResetPasswordController::class, 'showLinkRequestForm'])->name('password.forgot');
    // Отправка ссылки для восстановления пароля
    Route::post('password/forgot', [ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.link');
    // Страница восстановления пароля
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    // Восстановление пароля
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    // Страница регистрации
    Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
    // Регистрация
    Route::post('register', [RegisterController::class, 'register'])->name('register.process');
});

Route::middleware('auth')->group(function () {
    // Выход из системы
    Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');
});

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('orders/info', [HomeController::class, 'info']);

Route::middleware(['auth', 'verified'])->group(function () {
    // Главная страница для пользователей после авторизации
    Route::get('home', [HomeController::class, 'home'])->name('home');

    // Страница смены пароля
    Route::get('settings/password', [HomeController::class, 'password'])->name('settings.password');
    // Смена пароля
    Route::post('settings/password', [HomeController::class, 'passwordChange'])->name('settings.password.change');

    Route::middleware('role:user')->prefix('user')->group(function () {
        Route::get('home', [HomeController::class, 'userHomePage'])->name('user.home');
        Route::post('form2', [HomeController::class, 'form2'])->name('user.form2');
    });

    Route::middleware('role:moderator')->prefix('moderator')->group(function () {
        // Список заявок
        Route::get('orders', [ModeratorController::class, 'orders'])->name('moderator.orders');
        // Таблица заявок для плагина DataTable
        Route::get('orders/table', [ModeratorController::class, 'ordersTable']);
        // Просмотр заявки
        Route::get('orders/view/{order}', [ModeratorController::class, 'viewOrder'])->name('moderator.order.view');
        // Экспорт данных
        Route::get('export/{type}', [ModeratorController::class, 'export'])->name('moderator.export');
        // Страница с номинациями
        Route::get('nomination/{nomination:slug}', [ModeratorController::class, 'viewNomination'])->name('moderator.nomination');
        // Подробная информация об оценках заявки в конкретной номинации
        Route::get('nomination/{nomination:slug}/{order}', [ModeratorController::class, 'viewNominationValues'])->name('moderator.nomination.view');
        // Таблица с номинантами
        Route::get('nominations/{nomination:slug}', [ModeratorController::class, 'getNomination']);
        // Обновление оценок в номинации
        Route::put('values/{order}/update/{nomination}', [ModeratorController::class, 'updateValues'])->name('moderator.values.update');
        // Страница с участниками олимпиады
        Route::get('quiz', [ModeratorController::class, 'quiz'])->name('moderator.quiz');
        // Страница с информацией о результатах олимпиады
        Route::get('quiz/{order}/info', [ModeratorController::class, 'info'])->name('moderator.quiz.info');

        // Вход от другого пользователя
        Route::get('loginas/{user}', function ($user){
            Auth::loginUsingId($user);
            return redirect()->route('home');
        });

        Route::get('stage/{stage}', [ModeratorController::class, 'stage'])->name('moderator.stage');
        Route::get('stage/{stage}/table', [ModeratorController::class, 'stageTable']);
    });

    Route::middleware('role:admin')->prefix('admin')->group(function () {
        // Страница с экспертами
        Route::get('experts/create', [AdminController::class, 'createExpert'])->name('admin.experts.create');
        // Добавление экспертов
        Route::post('experts', [AdminController::class, 'storeExpert'])->name('admin.experts.store');
        // Распределение заявок по экспертам
        Route::get('experts/orders/{nomination}', [AdminController::class, 'orderToExpert'])->name('admin.experts.orders');
    });

    Route::middleware('role:expert')->prefix('expert')->group(function () {
        // Просмотр страницы с номинацией
        Route::get('nomination/{nomination:slug}', [ExpertController::class, 'viewNomination'])->name('expert.nomination');
        // Просмотр страницы с заявкой в номинации
        Route::get('nomination/{nomination:slug}/{order}', [ExpertController::class, 'valueNomination'])->name('expert.nomination.value');
        // Сохранение оценок
        Route::post('nomination/{nomination}/{order}', [ExpertController::class, 'storeValueNomination'])->name('expert.nomination.value.store');
        // Таблица со списком номинантов
        Route::get('nominations/{nomination:slug}', [ExpertController::class, 'getNomination']);
        // Страница с участниками олимпиады
        Route::get('quiz', [ExpertController::class, 'quiz'])->name('expert.quiz');
        // Страница с информацией о результатах олимпиады
        Route::get('quiz/{order}/info', [ExpertController::class, 'info'])->name('expert.quiz.info');
        // Сохранение оценок
        Route::post('quiz/{order}', [ExpertController::class, 'saveQuiz'])->name('expert.quiz.save');
    });
});
