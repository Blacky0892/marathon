@php
    $title = 'Участники онлайн-олимпиады';
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
    @vite('resources/js/moderator.js')
@endpush

@section('inline-buttons')
    <div class="d-inline-block me-0 float-start float-md-none">
        <a href="{{route('moderator.export', 'quiz')}}" class="btn btn-primary shadow px-2" title="Экспорт" data-bs-toggle="tooltip">
            <i data-acorn-icon="download" data-acorn-size="16"></i>
        </a>
    </div>
@endsection

@section('content')
    <div class="data-table-rows slim">
        @include('_layout.table_header',['table' => 'orders-table','includes' => ['search', 'pages'] ])
        <div class="data-table-responsive-wrapper">
            <table id="quiz-table" class="data-table col-9 hover">
                <thead>
                <tr>
                    <th>id заявки</th>
                    <th>Образовательная организация</th>
                    <th>Баллы</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->schools->first()->school->short_name}}</td>
                        <td>{{$order->value}}</td>
                        <td>
                            <a href="{{route('expert.quiz.info', $order->id)}}" class="btn btn-icon btn-icon-only btn-primary open-page" title="Октрыть результаты"><i data-acorn-icon="eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
