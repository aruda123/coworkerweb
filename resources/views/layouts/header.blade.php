<div class="header-wrap container col-group">
    <h1 class="logo">
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/LOGO3.svg') }}" alt="">
        </a>
    </h1>
    <h1 class="logo-m">
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/LOGO-M.svg') }}" alt="">
        </a>
    </h1>
    <div class="menu-btn">
        <img src="{{ asset('images/MENU.svg') }}" alt="">
    </div>
    <div class="menu-wrap col-group">
        <ul class="col-group">
            <li>
                <a href="{{ url('about') }}">
                    ABOUT US
                </a>
            </li>
            <li>
                <a href="{{ url('portfolio') }}">
                    PORTFOLIO
                </a>
            </li>
            <li>
                <a href="{{ url('service') }}">
                    SERVICE
                </a>
            </li>
            <li>
                <a href="{{ url('contact') }}">
                    CONTACT
                </a>
            </li>
        </ul>
    </div>
    <div class="menu-wrap-bg"></div>
</div>