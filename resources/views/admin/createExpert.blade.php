@php
    $title = 'Создание пользователя';
    $description= '';
@endphp
@extends('layout',[
'title'=>$title,
'description'=>$description
])

@push('css')
    <link rel="stylesheet" href="{{ asset('/vendor/css/datatables.min.css') }}"/>
@endpush

@push('js_vendor')
    @include('_layout.datatables_scripts')
@endpush

@push('js_page')

@endpush


@section('content')
    <div class="row g-3 mb-3">
        <form method="post" action="{{route('admin.experts.store')}}" class="col-12" >
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-sm-3">ФИО</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-3">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" name="email">
                </div>
            </div>
            <div class="row mb-3">
                <label for="nominations" class="col-sm-3">Номинации</label>
                <div class="col-sm-8">
                    <select class="form-control" id="nominations" name="nominations[]" multiple>
                        @foreach($nominations as $nomination)
                            <option value="{{$nomination->id}}">{{$nomination->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
