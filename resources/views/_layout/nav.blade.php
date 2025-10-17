<div class="nav-content d-flex">
    <!-- Logo Start -->
    <div class="logo position-relative">
        <a href="{{route('home')}}">
            <img src="{{ asset('vendor/img/logo/logo_text-02.svg') }}" alt="logo" />
        </a>
    </div>
    <!-- Logo End -->


    <!-- User Menu Start -->
    <div class="user-container d-flex">
        <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="profile" alt="profile" src="https://ui-avatars.com/api/?name={{auth()->user()->name}}&background=fff&color=25388e" />
            <div class="name">{{auth()->user()->name}}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-end user-menu wide">
            <div class="row  ms-0 me-0">
                <div class="col-12 ps-1 mb-2">
                    <div class="text-extra-small text-primary text-uppercase">Пользователь</div>
                </div>
                <div class="col-6 ps-1 pe-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{route('home')}}">Главная</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{route('settings.password')}}">Пароль</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mb-1 ms-0 me-0">
                <div class="col-12 p-1 mb-3 pt-3">
                    <div class="separator-light"></div>
                </div>
                <div class="col-6 ps-1 pe-0">

                </div>
                <div class="col-6 pe-0 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Выход</span>
                            </a>

                        </li>
                    </ul>
                </div>
                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">@csrf</form>
            </div>
        </div>
    </div>
    <!-- User Menu End -->

    <!-- Menu Start -->
    <div class="menu-container flex-grow-1">
        <ul id="menu" class="menu">
            @include('_layout.menu')
        </ul>
    </div>
    <!-- Menu End -->

    <!-- Mobile Buttons Start -->
    <div class="mobile-buttons-container">
        <!-- Scrollspy Mobile Button Start -->
        <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
            <i data-acorn-icon="menu-dropdown"></i>
        </a>
        <!-- Scrollspy Mobile Button End -->

        <!-- Scrollspy Mobile Dropdown Start -->
        <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
        <!-- Scrollspy Mobile Dropdown End -->

        <!-- Menu Button Start -->
        <a href="#" id="mobileMenuButton" class="menu-button">
            <i data-acorn-icon="menu"></i>
        </a>
        <!-- Menu Button End -->
    </div>
    <!-- Mobile Buttons End -->
</div>
<div class="nav-shadow"></div>
