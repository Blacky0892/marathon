@php
    $title = 'Номинации для оценки';
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

@section('inline-buttons')

@endsection

@section('content')
    <h4>Доступные номинации для оценки:</h4>
    @foreach(auth()->user()->nominations as $nomination)
        <div class="my-2">
            <a href="{{route('expert.nomination', $nomination->slug)}}" class="btn btn-primary">{{$nomination->name}}</a>
        </div>
    @endforeach
@endsection
