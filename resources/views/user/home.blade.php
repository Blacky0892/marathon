<!DOCTYPE html>
<html lang="ru" data-url-prefix="/" data-footer="true"
      data-override='{ &quot;attributes&quot; : { &quot;placement&quot; : &quot;vertical&quot;, &quot;layout&quot;:&quot;boxed&quot; },  &quot;showSettings&quot; : false }'
      @isset($html_tag_data) @foreach ($html_tag_data as $key=> $value)
        data-{{$key}}='{{$value}}'
  @endforeach
  @endisset
>

<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
  <title>Личный кабинет участника | просветительский марафон</title>
  <meta name="description" content=""/>
  @include('_layout.head')
  <link rel="stylesheet" href="{{ asset('/vendor/css/select2.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('/vendor/css/select2-bootstrap4.min.css') }}"/>
  @vite('resources/css/user.scss')
  @include('_layout.scripts')
  <script src="{{ asset('/vendor/js/vendor/select2.full.min.js') }}"></script>
  <script src="{{ asset('/vendor/js/vendor/select2ru.js') }}"></script>
  @vite('resources/js/user.js')
</head>

<body>
<div id="root">
  <div id="nav" class="nav-container d-flex" @isset($custom_nav_data) @foreach ($custom_nav_data as $key=> $value)
    data-{{$key}}="{{$value}}"
    @endforeach
    @endisset
  >
    @include('_layout.nav')
  </div>
  <main>
    @include('user.tilda')
  </main>
  @stack('modals')
</div>


</body>

</html>
