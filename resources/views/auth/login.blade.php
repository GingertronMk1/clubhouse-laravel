<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4"
                           :status="session('status')" />

    @env('local')
    <form class="card my-3"
          method="POST"
          action="{{ route('local_login_as_user') }}">
        @csrf
        <div class="card-header">(DEV) Log In As User</div>
        <div class="card-body">
            <x-input name="user_id"
                     type="select"
                     :options="\App\Models\User::get()" />
            <button class="btn btn-primary"
                    type="submit">Log In As User</button>
        </div>
    </form>
    @endenv

    <form class="card"
          method="POST"
          action="{{ route('login') }}">
        @csrf
        <div class="card-header">Log In</div>

        <!-- Email Address -->
        <div class="card-body">
            <x-input name="email"
                     type="email"
                     required
                     autofocus
                     autocomplete="username" />
            <x-input name="password"
                     type="password"
                     required
                     autofocus
                     autocomplete="current-password" />
            <x-input name="remember_me"
                     type="checkbox" />
        </div>
        <div class="card-footer">
            @if (Route::has('password.request'))
                <a class="btn btn-secondary"
                   href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <button class="btn btn-primary"
                    type="submit">Log In</button>
        </div>
    </form>
</x-app-layout>
