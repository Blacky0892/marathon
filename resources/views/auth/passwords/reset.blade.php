@extends('layout_auth',[
'title'=>'Смена пароля',
'description'=>'Страница авторизации'
])

@section('content_left')
    <div>
        <h1 class="d-block d-lg-none">Сброс пароля</h1>
        <h2 class="d-block d-lg-none">Введите новый пароль и подтверждение</h2>

        <form id="loginForm" class="tooltip-end-bottom mt-5 mt-lg-0" novalidate action="{{route('auth.password.update')}}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">
            <div class="mb-3 filled form-group tooltip-end-top">
                <i data-acorn-icon="lock-off"></i>
                <input class="form-control pe-7 @error('password') is-invalid @enderror bg-white" name="password" type="password" placeholder="Пароль" autocomplete="new-password"/>
                @error('password')
                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                @enderror
            </div>
            <div class="mb-3 filled form-group tooltip-end-top">
                <i data-acorn-icon="lock-off"></i>
                <input class="form-control pe-7 bg-white" name="password_confirmation" type="password" placeholder="Повтор пароля" autocomplete="new-password"/>
            </div>
            <button type="submit" class="btn btn-lg btn-primary">Сменить пароль</button>
        </form>
    </div>
    <div class="mt-1">
        <p class="h6">
            Если Вы помните пароль и перешли на данную страницу по ошибке, Вы можете
            <a href="{{route('auth.login')}}">перейти на страницу входа</a>
        </p>
    </div>
@endsection

@section('content_right')
    <div class="min-h-100 d-flex align-items-center w-100">
        <div class="w-100 p-5">
            <div>
                <div class="mb-5 d-flex align-items-start flex-column">
                    <h1 class="display-1 text-body display">Смена пароля</h1>
                    <p class="display-5">Введите новый пароль и подтверждение.</p>
                </div>
                <div class="mt-5 pt-5 auth-text">

                </div>
            </div>
        </div>
    </div>
@endsection
