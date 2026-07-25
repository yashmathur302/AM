<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | {{ config('app.name') }}</title>
    <meta name="robots" content="noindex, nofollow">
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
</head>
<body class="bg-navy-900">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-sm bg-white rounded-lg shadow-md p-8">
            <h1 class="text-center mb-6">{{ config('app.name') }} Admin</h1>

            @if ($errors->any())
                <div class="mb-4 rounded bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.attempt') }}">
                @csrf

                <x-ui.form.input name="email" type="email" label="Email" required autofocus autocomplete="username" />
                <x-ui.form.input name="password" type="password" label="Password" required autocomplete="current-password" />
                <x-ui.form.checkbox name="remember" label="Remember me" />

                <x-ui.button type="submit" variant="primary" block>Log In</x-ui.button>
            </form>
        </div>
    </div>
</body>
</html>
