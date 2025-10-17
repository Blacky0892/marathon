@php
    $title = 'Список заявок';
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
        <a href="{{route('moderator.export', 'stage-'.$stage)}}" class="btn btn-primary shadow px-2" title="Экспорт" data-bs-toggle="tooltip">
            <i data-acorn-icon="download" data-acorn-size="16"></i>
        </a>
    </div>
@endsection

@section('content')
    <div class="data-table-rows slim">
        @include('_layout.table_header',['table' => 'stage-table','includes' => ['search', 'pages'] ])
        <div class="data-table-responsive-wrapper">
            <table id="stage-table" data-stage="{{$stage}}" class="data-table col-9 hover">
                <thead>
                <tr>
                    <th>id заявки</th>
                    <th>ФИО</th>
                    <th>Образовательная организация</th>
                    <th>Ссылка</th>
                    <th></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
