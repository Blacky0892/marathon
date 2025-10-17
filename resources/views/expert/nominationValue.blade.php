@php
    use Illuminate\Support\Facades\Storage;$title = 'Заявка № ' . $order->id;
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
      <span>Заявка</span>
    </h4>
    <dl class="row mb-0">
      <dt class="col-sm-3">Округ</dt>
      <dd class="col-sm-8">{{$order->area->short_name}}</dd>
      <dt class="col-sm-3">МРСД</dt>
      <dd class="col-sm-8">{{$order->mrsd}}</dd>
      <dt class="col-sm-3">ОО</dt>
      <dd class="col-sm-8">{{$order->school->short_name}}</dd>
      <dt class="col-sm-3">Классы</dt>
      <dd class="col-sm-8">{{$order->class}}</dd>
      <dt class="col-sm-3">Количество обучающихся</dt>
      <dd class="col-sm-8">{{$order->count_student}}</dd>
      <dt class="col-sm-3">Количество взрослых</dt>
      <dd class="col-sm-8">{{$order->count_adult}}</dd>
      <dt class="col-sm-3">ФИО</dt>
      <dd class="col-sm-8">{{$order->user->name}}</dd>
      <dt class="col-sm-3">Email</dt>
      <dd class="col-sm-8">{{$order->user->email}}</dd>
      <dt class="col-sm-3">Телефон</dt>
      <dd class="col-sm-8">{{$order->user->phone}}</dd>
    </dl>
  </div>
    <hr class="bg-alternate">
    <div class="row g-3 mb-3">
        <h4 class="col-12 text-primary">
            <span>2. </span>
            <span>Конкурсные материалы</span>
        </h4>
      <div class="col-12">
        <h5>Ссылка: <a href="{{$order->link}}" target="_blank">{{$order->link}}</a></h5>

        @if(!is_null($order->link_more))
          @foreach(explode(PHP_EOL, $order->link_more) as $link)
            <h6><a href="{{$link}}" target="_blank">{{$link}}</a></h6>
          @endforeach
        @endif

      </div>
        <form class="col-12 mt-5" method="post" action="{{route('expert.nomination.value.store', [$nomination->id, $order->id])}}">
            @csrf
            <h3>Критерии для оценивания</h3>
            @foreach($criterias as $criteria)
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <h5><b>{{$loop->iteration}}. {{$criteria->title}}</b></h5>
                        <p>{{$criteria->description}}</p>
                    </div>
                    <select class="form-control" style="width: 50px; height: 50px" name="value-{{$criteria->id}}" required>
                        <option value=""></option>
                        @for($i = $criteria->min; $i <= $criteria->max; $i++)
                            <option value="{{$i}}" @if(!is_null($values))@selected($values[$criteria->id] == $i) @endif>{{$i}}</option>
                        @endfor
                    </select>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Сохранить оценки</button>
        </form>
    </div>
@endsection
