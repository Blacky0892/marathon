@extends('layout_auth',[
'title'=>'Подтверждение email',
'description'=>'Страница подтверждения'
])

@section('content_left')
    <div class="d-flex d-lg-none align-items-start flex-column">
        <h2 >Для доступа в личный кабинет вам необходимо подтвердить свой адрес электронной почты</h2>
        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <h3>Письмо с инструкциями было направлено на ваш адрес электронной почты, указанный при регистрации.</h3>
            <h3>Если вы не получили сообщение,
                <button type="submit" class="d-contents btn btn-link p-0 m-0 align-baseline">нажмите здесь, чтобы отправить еще одно письмо.</button>
            </h3>

            <h4 class="mt-7"><a href="{{route('verifyToLogin')}}">
                    Нажмите здесь, чтобы вернуться к странице входа
                </a> </h4>
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    Ссылка для подтверждения была отправлена на ваш адрес электронной почты
                </div>
            @endif
        </form>
    </div>
@endsection

@section('content_right')
    <div class="min-h-100 d-flex align-items-center w-100">
        <div class="w-100 p-5">
            <div>
                <div class="mb-5 d-flex align-items-start flex-column">
                    <h2 class="display-3 mb-5">Для доступа в личный кабинет вам необходимо подтвердить свой адрес электронной почты</h2>
                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <h3 class="display-5">Письмо с инструкциями было направлено на ваш адрес электронной почты, <br>указанный при регистрации. <br>Если вы не получили сообщение,<br>
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">нажмите здесь, чтобы отправить еще одно письмо</button>.
                        </h3>

                        <h4 class="mt-7"><a href="{{route('verifyToLogin')}}">
                                Нажмите здесь, чтобы вернуться к странице входа
                            </a> </h4>
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                Ссылка для подтверждения была отправлена на ваш адрес электронной почты
                            </div>
                        @endif
                    </form>
                </div>
                <div class="mt-5 pt-5 auth-text">

                </div>
            </div>
        </div>
    </div>
@endsection
