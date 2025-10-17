@php
    $title = 'Список пользователей';
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
    <div class="data-table-rows slim">
        <div class="data-table-responsive-wrapper">
            <table id="experts-table" class="data-table col-9 hover">
                <thead>
                <tr>
                    <th>Эксперт</th>
                    <th>Номинации</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($experts as $expert)
                    <tr>
                        <td>{{$expert->name}}</td>
                        <td>{{$expert->nominations->implode('name')}}</td>
                        <td><a href="#">Редактировать</a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{route('admin.experts.create')}}" class="btn btn-primary">Добавить</a>
        </div>
    </div>

@endsection
