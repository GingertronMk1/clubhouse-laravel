@php
    $links = [
        'dashboard' => 'Dashboard',
        'competition.index' => 'Competition',
        'game.index' => 'Game',
        'person.index' => 'Person',
        'sport.index' => 'Sport',
        'team.index' => 'Team',
    ];
@endphp

<nav class="navbar navbar-expand-lg bg-body-tertiary"
     x-data="{ open: false }">
    <div class="container-fluid">
        <a class="navbar-brand"
           href="#"><i class="fa-solid fa-football"></i></a>
        <button class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                type="button"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
                @click="open = ! open">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse"
             id="navbarSupportedContent"
             :class="{ show: open }">
            <ul class="navbar-nav mb-lg-0 mb-2 me-auto">
                @foreach ($links as $route => $text)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs($route) ? 'active' : '' }}"
                           href="{{ route($route) }}">
                            {{ __($text) }}
                        </a>
                    </li>
                @endforeach
            </ul>

            @auth
                <div class="dropdown"
                     x-data="{ profileMenuOpen: false }"
                     @click.outside="profileMenuOpen = false">
                    <a class="nav-link dropdown-toggle"
                       href="#"
                       @click="profileMenuOpen = ! profileMenuOpen">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu end-0"
                        :class="{ show: profileMenuOpen }">
                        <li>
                            <a class="dropdown-item"
                               href="{{ route('profile.edit') }}">
                                {{ __('Profile') }}
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form class="dropdown-item"
                                  action="{{ route('logout') }}"
                                  method="post">
                                <button class="btn btn-danger"
                                        type="submit">Log Out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
            @guest
                <a class="nav-link"
                   href="{{ route('login') }}">Log In</a>
            @endguest
        </div>
    </div>
</nav>
