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
    <title>{{$title ?? '«1 + 1»'}} | просветительский марафон</title>
    <meta name="description" content="{{$description}}"/>
    @include('_layout.head')
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
        <div class="container">
            {{-- Title and Top Buttons Start --}}
            <div class="page-title-container">
                <div class="row">
                    {{-- Title Start --}}
                    <div class="col-12 col-md-7">
                        <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>

                    </div>
                    {{-- Title End --}}
                </div>
            </div>
            {{-- Title and Top Buttons End --}}

            {{-- Content Start --}}
            <div class="card mb-2">
                <div class="card-body h-100">
                    @yield('content')
                </div>
            </div>
            {{-- Content End --}}
        </div>

    </main>
    @stack('modals')
    @include('_layout.footer')
</div>
@include('_layout.scripts')
</body>

</html>
