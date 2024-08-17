@php
$links = [
    'dashboard' => 'Dashboard',
    'competition.index' => 'Competition',
    'game.index' => 'Game',
    'person.index' => 'Person',
    'position.index' => 'Position',
    'sport.index' => 'Sport',
    'team.index' => 'Team',
];
@endphp

<nav x-data="{ open: false }" class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-football"></i></a>
        <button @click="open = ! open" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div
            class="collapse navbar-collapse"
            :class="{ show: open }"
            id="navbarSupportedContent"
        >
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @foreach($links as $route => $text)
                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->routeIs($route) ? 'active' : '' }}"
                            href="{{ route($route) }}"
                        >
                            {{ __($text) }}
                        </a>
                    </li>
                @endforeach
            </ul>

            @auth
            <div x-data="{ profileMenuOpen: false }" class="dropdown" @click.outside="profileMenuOpen = false">
                <a class="nav-link dropdown-toggle" href="#" @click="profileMenuOpen = ! profileMenuOpen">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu end-0" :class="{ show: profileMenuOpen }">
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            {{ __('Profile') }}
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form class="dropdown-item" action="{{ route('logout') }}" method="post">
                            <button type="submit" class="btn btn-danger">Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="nav-link">Log In</a>
            @endguest
        </div>
    </div>
</nav>
