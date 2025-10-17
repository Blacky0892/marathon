@extends('layout_auth',[
'title'=>'Сброс пароля',
'description'=>'Страница авторизации'
])


@section('content_left')
    <div>
        <h1 class="d-block d-lg-none">Восстановление пароля</h1>
        {{-- <h4 class="d-block d-lg-none bg-primary text-white px-2 d-inline mb-0">в корпоративную информационную</h4>--}}
        {{--<h1 class="d-inline d-lg-none mb-4 bg-primary text-white px-2 mb-5">в автоматизированную информационную систему "Сопровождение 2.0"</h1>--}}

        <div class="d-block d-lg-none">
            @if (session('status'))
                <p class="display-5 alert alert-success">{{session('status')}}</p>
            @else
                <p class="display-5">Пожалуйста, ведите email для получение ссылки на смену пароля.</p>
            @endif
        </div>


        <form id="loginForm" class="tooltip-end-bottom mt-5 mt-lg-0" novalidate action="{{route('auth.password.link')}}" method="post">
            @csrf
            <div class="mb-3 filled form-group tooltip-end-top">
                <i data-acorn-icon="email"></i>
                <input class="form-control @error('email') is-invalid @enderror bg-white" placeholder="Email" name="email" value="{{old('email')}}"/>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-lg btn-primary">Отправить</button>
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
                    <h1 class="display-1 text-body display">Восстановление пароля</h1>
                    @if (session('status'))
                        <p class="display-5 alert alert-success">{{session('status')}}</p>
                    @else
                        <p class="display-5">Воспользуйтесь функцией восстановления пароля</p>
                    <p class="display-5">Логин – почта, указанная при регистрации.</p>
                    <p class="display-5">Вам на почту, указанную при регистрации, придет новый пароль</p>
                    <p class="display-5">Если вы не помните свой логин или система не распознает пользователя, свяжитесь с нами по электронной почте <a href="mailto:marathon@gppc.ru">marathon@gppc.ru</a> или по телефону <a href="tel:+79166861734">+79166861734</a> </p>
                    @endif
                </div>
                <div class="mt-5 pt-5 auth-text">

                </div>
            </div>
        </div>
    </div>
@endsection
