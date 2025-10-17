@extends('layout_auth',[
'title'=>'Авторизация',
'description'=>'Страница авторизации'
])

@push('js_page')
    @vite('resources/js/auth.js')
@endpush

@section('content_left')
    <div>
        <h1 class="d-block d-lg-none display-1">Добро пожаловать</h1>
        <h1 class="d-inline d-lg-none mb-4 bg-primary text-white mb-5">в личный кабинет просветительского марафона «ДЕТИ И МОЛОДЕЖЬ ПРОТИВ ЭКСТРЕМИЗМА И ТЕРРОРИЗМА»</h1>

        <form id="loginForm" class="tooltip-end-bottom mt-5 mt-lg-0" novalidate action="{{route('auth.login.process')}}" method="post">
            @csrf
            <div class="mb-3 filled form-group tooltip-end-top">
                <i data-acorn-icon="user"></i>
                <input class="form-control @error('email') is-invalid @enderror bg-white" placeholder="Логин" name="email" value="{{old('email')}}" autocomplete="username"/>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                @enderror
            </div>
            <div class="mb-3 filled form-group tooltip-end-top">
                <i data-acorn-icon="lock-off"></i>
                <input class="form-control pe-7 @error('password') is-invalid @enderror bg-white" name="password" type="password" placeholder="Пароль" autocomplete="password"/>
                @error('password')
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                @enderror
                <a class="text-small position-absolute t-3 e-3"
                   href="{{route('auth.password.forgot')}}">Забыли?</a>
            </div>
            <button type="submit" class="btn btn-lg btn-primary">Войти</button>
        </form>
    </div>
@endsection

@section('content_right')
    <div class="min-h-100 d-flex align-items-center w-100">
        <div class="w-100 p-5">
            <div>
                <div class="mb-5 d-flex align-items-start flex-column">
                    <h1 class="display-1 text-body display">Добро пожаловать</h1>
                    <h1 class="display-3 bg-primary text-white px-2 d-inline mb-0">в личный кабинет просветительского марафона</h1>
                    <h1 class="display-3 bg-primary text-white px-2 d-inline mb-0">«ДЕТИ И МОЛОДЕЖЬ ПРОТИВ ЭКСТРЕМИЗМА </h1>
                    <h1 class="display-3 bg-primary text-white px-2 d-inline">И ТЕРРОРИЗМА»</h1>
                </div>
                <div class="mt-5 pt-5 auth-text">

                </div>
            </div>
        </div>
    </div>
@endsection
