@php
    $title = 'Заявка № ' . $order->id;
    $description= '';
@endphp
@extends('layout',[
'title'=>$title,
'description'=>$description
])

@section('content')
    <div class="row g-3 mb-3">
        <h4 class="col-12 text-primary">
            <span>1. </span>
            <span>Ответственный от ОО (в соответствии с заявкой)</span>
        </h4>
        <dl class="row mb-0">
            <dt class="col-sm-3">ФИО</dt>
            <dd class="col-sm-8">{{$order->name}}</dd>
            <dt class="col-sm-3">Должность</dt>
            <dd class="col-sm-8">{{$order->post->title ?? null}}</dd>
            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-8">{{$order->email}}</dd>
            <dt class="col-sm-3 text-truncate">Телефон</dt>
            <dd class="col-sm-8">{{$order->phone}}</dd>
        </dl>
    </div>
    <hr class="bg-alternate">
    <div class="row g-3 mb-3">
        <h4 class="col-12 text-primary">
            <span>2. </span>
            <span>Информация об ОО</span>
        </h4>
        <div class="row">
          <div class="col-md-12">
            <dl class="row mb-0">
              <dt class="col-sm-3">Полное название ОО</dt>
              <dd class="col-sm-8">{{$order->school->name ?? null}}</dd>
              <dt class="col-sm-3">Краткое название ОО</dt>
              <dd class="col-sm-8">{{$order->school->short_name ?? null}}</dd>
              <dt class="col-sm-3">Округ</dt>
              <dd class="col-sm-8">{{$order->school->area->name ?? null}}</dd>
              <dt class="col-sm-3 text-truncate">МРСД</dt>
              <dd class="col-sm-8">{{$order->school->mrsd ?? null}}</dd>
            </dl>
          </div>
        </div>
    </div>
    {{--<hr class="bg-alternate">
    <div class="row g-3 mb-3">
        <h4 class="col-12 text-primary">
            <span>3. </span>
            <span>Конкурсные материалы</span>
        </h4>
        <div class="col-12">
            <dl class="row mb-0">
                <dt class="col-sm-3">Заявка на участие (Приложение 1 к Положению)</dt>
                <dd class="col-sm-9 row">
                    <div class="col-8">
                        @if(is_null($order->order))
                            Файл не загружен <i class="text-danger" data-acorn-icon="warning-circle"></i>
                        @else
                            <a href="{{asset('storage/'.$order->order)}}" target="_blank">Посмотреть файл</a>
                        @endif
                    </div>
                </dd>
            </dl>
            <dl class="row mb-0">
                <dt class="col-sm-3">Дополнение к заявке на участие (Приложение 2 к Положению)</dt>
                <dd class="col-sm-9 row">
                    <div class="col-8">
                        @if(is_null($order->application))
                            Файл не загружен <i class="text-danger" data-acorn-icon="warning-circle"></i>
                        @else
                            <a href="{{asset('storage/'.$order->application)}}" target="_blank">Посмотреть файл</a>
                        @endif
                    </div>
                </dd>
            </dl>
            <dl class="row mb-0">
                <dt class="col-sm-3">Афиша концертной программы</dt>
                <dd class="col-sm-9 row">
                    <div class="col-8">
                        @if(is_null($order->poster))
                        Ссылка не загружена <i class="text-danger" data-acorn-icon="warning-circle"></i>
                        @else
                        <a href="{{$order->poster}}" target="_blank">{{$order->poster}}</a>
                        @endif
                    </div>
                </dd>
            </dl>
            <dl class="row mb-0">
                <dt class="col-sm-3">Размещение афиши на сайте и/или в соцсети школы</dt>
                <dd class="col-sm-9 row">
                    <div class="col-8">
                        @if(is_null($order->poster_link))
                            Ссылка не загружена <i class="text-danger" data-acorn-icon="warning-circle"></i>
                        @else
                            <a href="{{$order->poster_link}}" target="_blank">{{$order->poster_link}}</a>
                        @endif
                    </div>
                </dd>
            </dl>
            <dl class="row mb-0">
                <dt class="col-sm-3">Видеотрейлер к концертной программе</dt>
                <dd class="col-sm-9 row">
                    <div class="col-8">
                        @if(is_null($order->trailer))
                            Ссылка не загружена <i class="text-danger" data-acorn-icon="warning-circle"></i>
                        @else
                            <a href="{{$order->trailer}}" target="_blank">{{$order->trailer}}</a>
                        @endif
                    </div>
                </dd>
            </dl>
            <dl class="row mb-0">
                <dt class="col-sm-3">Размещение видеотрейлера на сайте и/или в соцсети школы</dt>
                <dd class="col-sm-9 row">
                    <div class="col-8">
                        @if(is_null($order->trailer_link))
                            Ссылка не загружена <i class="text-danger" data-acorn-icon="warning-circle"></i>
                        @else
                            <a href="{{$order->trailer_link}}" target="_blank">{{$order->trailer_link}}</a>
                        @endif
                    </div>
                </dd>
            </dl>
            <dl class="row mb-0">
                <dt class="col-sm-3">Концертная программа</dt>
                <dd class="col-sm-9 row">
                    <div class="col-8">
                        @if(is_null($order->program))
                            Ссылка не загружена <i class="text-danger" data-acorn-icon="warning-circle"></i>
                        @else
                            <a href="{{$order->program}}" target="_blank">{{$order->program}}</a>
                        @endif
                    </div>
                </dd>
            </dl>
          <dl class="row mb-0">
            <dt class="col-sm-3">Репортаж о проведении концертной программы</dt>
            <dd class="col-sm-9 row">
              <div class="col-8">
                @if(is_null($order->program_reportage))
                  Ссылка не загружена <i class="text-danger" data-acorn-icon="warning-circle"></i>
                @else
                  <a href="{{$order->program_reportage}}" target="_blank">{{$order->program_reportage}}</a>
                @endif
              </div>
            </dd>
          </dl>
            <dl class="row mb-0">
                <dt class="col-sm-3">Ведущие концертной программы</dt>
                <dd class="col-sm-9 row">
                    <div class="col-8">
                        @if(is_null($order->is_host))
                            Не выбрано <i class="text-danger" data-acorn-icon="warning-circle"></i>
                        @else
                            {{$order->is_host ? 'Участвуем' : 'Не участвуем'}}
                        @endif
                    </div>
                </dd>
            </dl>
            <dl class="row mb-0">
                <dt class="col-sm-3">Культурно-познавательный маршрут</dt>
                <dd class="col-sm-9 row">
                    <div class="col-8">
                        @if(is_null($order->route))
                            Файл не загружен <i class="text-danger" data-acorn-icon="warning-circle"></i>
                        @else
                            <a href="{{asset('storage/'.$order->route)}}" target="_blank">Посмотреть файл</a>
                        @endif
                    </div>
                </dd>
            </dl>
            <dl class="row mb-0">
                <dt class="col-sm-3">Интеллектуальная викторина</dt>
                <dd class="col-sm-9 row">
                    <div class="col-8">
                        @if(is_null($order->quiz))
                            Файл не загружен <i class="text-danger" data-acorn-icon="warning-circle"></i>
                        @else
                            <a href="{{asset('storage/'.$order->quiz)}}" target="_blank">Посмотреть файл</a>
                        @endif
                    </div>
                </dd>
            </dl>
            <dl class="row mb-0">
                <dt class="col-sm-3">Видеоролик</dt>
                <dd class="col-sm-9 row">
                    <div class="col-8">
                        @if(is_null($order->video))
                            Ссылка не загружена <i class="text-danger" data-acorn-icon="warning-circle"></i>
                        @else
                            <a href="{{$order->video}}" target="_blank">{{$order->video}}</a>
                        @endif
                    </div>
                </dd>
            </dl>
          <dl class="row mb-0">
            <dt class="col-sm-3">Размещение видеоролика на сайте и/или в соцсети школы</dt>
            <dd class="col-sm-9 row">
              <div class="col-8">
                @if(is_null($order->video_link))
                  Ссылка не загружена <i class="text-danger" data-acorn-icon="warning-circle"></i>
                @else
                  <a href="{{$order->video_link}}" target="_blank">{{$order->video_link}}</a>
                @endif
              </div>
            </dd>
          </dl>
        </div>
        <div class="col-12 d-flex justify-content-start">
            <a href="{{route('home')}}" class="btn btn-dark">Назад</a>
        </div>
    </div>--}}
@endsection
