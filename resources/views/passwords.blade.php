@php
    $title = 'Смена пароля';
    $description= 'На данной странице вы можете изменить свой пароль';
@endphp
@extends('layout',[
'title'=>$title,
'description'=>$description
])

@section('content')
    <p>Введите текущий пароль и новый для его изменения</p>
    <form method="post" class="row g-3 mb-3" action="{{route('settings.password.change')}}">
        @csrf
        <div class="col-md-12">
            <div class="form-floating">
                <input type="password" class="form-control @error('currentPassword')is-invalid @enderror" name="currentPassword" id="currentPassword" autocomplete="password">
                @error('currentPassword')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
                <label for="currentPassword">Текущий пароль</label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-floating">
                <input type="password" class="form-control @error('password')is-invalid @enderror" name="password" id="password" autocomplete="new-password">
                @error('password')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
                <label for="password">Новый пароль</label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-floating">
                <input type="password" class="form-control @error('password')is-invalid @enderror" name="password_confirmation" id="password_confirmation" autocomplete="new-password">
                <label for="password_confirmation">Повтор пароля</label>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
@endsection
