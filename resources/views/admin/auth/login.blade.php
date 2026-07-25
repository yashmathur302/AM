<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | {{ config('app.name') }}</title>
    <meta name="robots" content="noindex, nofollow">
    @vite(['resources/sass/admin.scss', 'resources/js/admin.js'])
</head>
<body>
    <div class="admin-login">
        <div class="admin-login__panel">
            <h1 class="admin-login__title">{{ config('app.name') }} Admin</h1>

            @if ($errors->any())
                <div class="admin-alert admin-alert--error" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.attempt') }}">
                @csrf

                <div class="c-form-group">
                    <label class="c-form-label" for="email">Email</label>
                    <input class="c-form-control" type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                </div>

                <div class="c-form-group">
                    <label class="c-form-label" for="password">Password</label>
                    <input class="c-form-control" type="password" id="password" name="password" required autocomplete="current-password">
                </div>

                <div class="c-form-group">
                    <label class="c-form-label">
                        <input type="checkbox" name="remember"> Remember me
                    </label>
                </div>

                <button type="submit" class="c-btn c-btn--primary c-btn--block">Log In</button>
            </form>
        </div>
    </div>
</body>
</html>
