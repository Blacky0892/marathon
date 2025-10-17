@php
    use Illuminate\Support\Facades\Auth;$title = 'Подробная информация об олимпиаде';
    $description= '';
@endphp
@extends('layout',[
'title'=>$title,
'description'=>$description
])

@push('css')
    <link rel="stylesheet" href="{{ asset('/vendor/css/datatables.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/vendor/css/baguetteBox.min.css') }}"/>
@endpush

@push('js_vendor')
    @include('_layout.datatables_scripts')
    <script src="{{ asset('/vendor/js/vendor/baguetteBox.min.js') }}"></script>
@endpush

@push('js_page')
    @vite('resources/js/moderator.js')
    @vite('resources/js/quiz.js')
@endpush


@section('content')
    <form class="row g-3 mb-3" method="post" action="{{route('expert.quiz.save', $order->id)}}">
        @csrf
        <dl class="row mb-0">
            <dt class="col-sm-3">Краткое название ОО</dt>
            <dd class="col-sm-8">{{$order->schools->first()->school->short_name}}</dd>
        </dl>

        <dl class="row mb-0">
            <dt class="col-sm-3">Вопрос № 1 (Видеовопрос)</dt>
            <dd class="col-sm-8">
                @if(!is_null($quiz))
                    {{$quiz->data2->video ?? 'Нет ответа'}}
                @else
                    нет ответа
                @endif
            </dd>
        </dl>
        @if(!is_null($quiz))
            <div class="form-floating">
                <input class="form-control" name="video" id="video"
                       value="{{$quiz->values->firstWhere('expert_id', Auth::id())->video ?? ''}}"
                       onblur='validate(this, 0, 1);'>
                <label for="video">Оценка (от 0 до 1)</label>
            </div>
        @endif
        <dl class="row mt-5">
            <dt class="col-sm-3">Вопрос № 2</dt>
            <dd class="col-sm-8">
                @if(!is_null($quiz))
                    <p><b>Достопримечательность:</b> {{$quiz->data2->sight ?? 'Нет ответа'}}</p>
                    <p><b>Факт 1:</b> {{$quiz->data2->sight1 ?? 'Нет ответа'}}</p>
                    <p><b>Факт 2:</b> {{$quiz->data2->sight2 ?? 'Нет ответа'}}</p>
                    <p><b>Факт 3:</b> {{$quiz->data2->sight3 ?? 'Нет ответа'}}</p>
                @else
                    нет ответа
                @endif
            </dd>
        </dl>
        @if(!is_null($quiz))
            <div class="form-floating">
                <input class="form-control" name="sight" id="sight"
                       value="{{$quiz->values->firstWhere('expert_id', Auth::id())->sight ?? ''}}"
                       onblur='validate(this, 0, 3);'>
                <label for="sight">Оценка (от 0 до 3)</label>
            </div>
        @endif

        <div class="col-12 d-flex justify-content-start">
            @if(!is_null($quiz))
                <button type="submit" class="btn btn-primary">Сохранить оценки</button>
            @endif
            <a href="{{route('expert.quiz')}}" class="btn btn-dark ms-2">Назад</a>
        </div>
    </form>

    <script>
        function validate(box, min, max) {
            const val = box.value;
            if (isNaN(val) || (min > val || max < val)) {
                box.value = '';
                alert('Введите оценку от ' + min + ' до ' + max);
            }
        }
    </script>
@endsection
