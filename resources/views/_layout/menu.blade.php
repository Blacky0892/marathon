@if(auth()->user()->hasRole('user'))
    <li>
        <a href="{{route('user.home')}}"
           class="{{ isset($active) && $active === 'home' ? 'active' : '' }}"
        >
            <i data-acorn-icon="notebook-1" class="icon" data-acorn-size="18"></i>
            <span class="label">Личный кабинет</span>
        </a>
    </li>
@endif
@if(auth()->user()->hasRole('moderator'))
  <li>
    <a href="{{route('moderator.orders')}}"
       class="{{ isset($active) && $active === 'orders' ? 'active' : '' }}"
    >
      <i data-acorn-icon="notebook-1" class="icon" data-acorn-size="18"></i>
      <span class="label">Список заявок</span>
    </a>
  </li>
  <li>
    <a href="{{route('moderator.stage', 1)}}"
       class="{{ isset($active) && $active === 'stage-1' ? 'active' : '' }}"
    >
      <i data-acorn-icon="notebook-1" class="icon" data-acorn-size="18"></i>
      <span class="label">Этап I</span>
    </a>
  </li>
  <li>
    <a href="{{route('moderator.stage', 2)}}"
       class="{{ isset($active) && $active === 'stage-2' ? 'active' : '' }}"
    >
      <i data-acorn-icon="notebook-1" class="icon" data-acorn-size="18"></i>
      <span class="label">Этап II</span>
    </a>
  </li>
  <p class="my-5 text-white">Модерирование</p>
    @foreach($nominations as $nomination)
      @if($nomination->slug !== 'quiz1')
        <li>
            <a href="{{route('moderator.nomination', $nomination->slug)}}"
               class="{{ isset($active) && $active === 'nom-'.$nomination->slug ? 'active' : '' }}"
            >
                <i data-acorn-icon="notebook-1" class="icon" data-acorn-size="18"></i>
                <span class="label">{{$nomination->name}}</span>
            </a>
        </li>
      @endif
    @endforeach
@endif
@if(auth()->user()->hasRole('expert'))
  <p class="my-5 text-white">Оценивание</p>
    @foreach(auth()->user()->nominations as $nomination)
        <li>
            <a href="{{route('expert.nomination', $nomination->slug)}}"
               class="{{ isset($active) && $active === 'nom-'.$nomination->slug ? 'active' : '' }}"
            >
                <i data-acorn-icon="notebook-1" class="icon" data-acorn-size="18"></i>
                <span class="label">{{$nomination->name}}</span>
            </a>
        </li>
    @endforeach

@endif
