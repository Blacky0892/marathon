@extends('layout_auth',[
'title'=>'Регистрация',
'description'=>'Страница регистрации'
])

@push('js_page')
    @vite('resources/js/auth.js')
@endpush

@section('content_left')
    <div>
        <h1 class="d-block d-lg-none display-1">Добро пожаловать</h1>
        <h1 class="d-inline d-lg-none mb-4 bg-primary text-white mb-5">в форму регистрации просветительского марафона «ДЕТИ И МОЛОДЕЖЬ ПРОТИВ ЭКСТРЕМИЗМА И ТЕРРОРИЗМА»</h1>

        <form id="registerForm" class="tooltip-end-bottom mt-5 mt-lg-0 d-flex flex-column" novalidate action="{{route('auth.register.process')}}" method="post">
            @csrf
            <div class="mb-3 filled form-group tooltip-end-top">
                <input class="form-control @error('name') is-invalid @enderror bg-white mb-3 p-3" placeholder="ФИО ответственного" name="name" value="{{old('name')}}" autocomplete="name"/>
                @error('name')
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                @enderror
                <input type="email" class="form-control @error('email') is-invalid @enderror bg-white mb-3 p-3" placeholder="Email" name="email" value="{{old('email')}}" autocomplete="username"/>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                @enderror
              <input type="password" class="form-control @error('password') is-invalid @enderror bg-white mb-3 p-3" placeholder="Пароль" name="password" value="{{old('password')}}" autocomplete="password"/>
              @error('password')
              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
              @enderror
              <input type="password" class="form-control bg-white mb-3 p-3" placeholder="Повтор пароля" name="password_confirmation" value="{{old('password_confirmation')}}" autocomplete="password_confirmation"/>

                <input type="tel" class="form-control @error('phone') is-invalid @enderror bg-white mb-3 p-3" placeholder="Телефон" name="phone" value="{{old('phone')}}" autocomplete="phone"/>
                @error('phone')
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                @enderror
                <select class="form-control schoolSelect @error('oo') is-invalid @enderror" name='oo'>
                    <option value=""></option>
                    @foreach($schools as $school)
                        <option value="{{$school->id}}" {{ old('oo') == $school->id ? 'selected' : '' }}>
                            {{$school->short_name}}
                        </option>
                    @endforeach
                </select>
                @error('oo')
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-lg btn-primary py-3 px-4">Регистрация</button>
        </form>
    </div>
@endsection

@section('content_right')
    <div class="min-h-100 d-flex align-items-center w-100">
        <div class="w-100 p-5">
            <div>
                <div class="mb-5 d-flex align-items-start flex-column">
                    <h1 class="display-1 text-body display">Добро пожаловать</h1>
                    <h1 class="display-3 bg-primary text-white px-2 d-inline mb-0">в форму регистрации просветительского марафона</h1>
                    <h1 class="display-3 bg-primary text-white px-2 d-inline mb-0">«ДЕТИ И МОЛОДЕЖЬ ПРОТИВ ЭКСТРЕМИЗМА </h1>
                    <h1 class="display-3 bg-primary text-white px-2 d-inline">И ТЕРРОРИЗМА»</h1>
                </div>
                <div class="mt-5 pt-5 auth-text">

                </div>
            </div>
        </div>
    </div>
@endsection
