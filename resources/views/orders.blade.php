<!DOCTYPE html>
<html lang="ru" data-url-prefix="/" data-footer="true"
      data-override='{ &quot;attributes&quot; : { &quot;placement&quot; : &quot;horizontal&quot;},  &quot;showSettings&quot; : false }'
>
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
  <title>{{$title ?? '«ДЕТИ И МОЛОДЕЖЬ ПРОТИВ ЭКСТРЕМИЗМА И ТЕРРОРИЗМА»'}} | Просветительский марафон</title>
  <meta name="description" content=""/>
  @include('_layout.head')
  <style>
    .orders-table tr th, .orders-table tr td{
      max-width: 100px !important;
      border-bottom: 1px solid;
    }
  </style>
</head>
<body>
<div id="root">
  <main>
    <div class="container">

      {{-- Content Start --}}
      <div class="card mb-2">
        <div class="card-body h-100">
          <div class="">
            <table class="table orders-table">
              <thead>
              <tr>
                <th>#</th>
                <th >Афиша</th>
                <th >Викторина</th>
                <th >Маршрут</th>
                <th >ОО</th>
              </tr>
              </thead>
              <tbody>
              @foreach($orders as $order)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td >
                    @if(!is_null($order->poster))
                      <a href="{{$order->poster}}">{{$order->poster}}</a>
                    @endif
                  </td>
                  <td >
                    @if(!is_null($order->quiz))
                      <a href="{{config('app.url')."storage/".$order->quiz}}">{{config('app.url')."storage/".$order->quiz}}</a>
                    @endif
                  </td>
                  <td >
                    @if(!is_null($order->route))
                      <a href="{{config('app.url')."storage/".$order->route}}">{{config('app.url')."storage/".$order->route}}</a>
                    @endif
                  </td>
                  <td >{{$order->schools->first()->school->short_name ?? null}}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      {{-- Content End --}}
    </div>

  </main>

  @include('_layout.footer')
</div>
@include('_layout.scripts')
</body>

</html>
