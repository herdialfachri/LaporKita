<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | LaporKita</title>

    <link rel="icon" href="{{ asset('assets/landing_page/src/img/favicon.jpg') }}">

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Auth CSS -->
    <link rel="stylesheet" href="{{ asset('assets/auth/auth.css') }}">
</head>

<body>

    <div class="auth-wrapper">

        <div class="auth-card">

            <!-- HEADER -->
            <div class="auth-header">

                <div class="logo">
                    LK
                </div>

                <h1 class="auth-title">
                    Selamat Datang
                </h1>

                <p class="auth-subtitle">
                    Login untuk mengakses layanan LaporKita
                </p>

            </div>

            <!-- BODY -->
            <div class="auth-body">

                {{-- STATUS --}}
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                {{-- ERROR --}}
                @if ($errors->any())
                <div class="alert alert-error">
                    @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                    @endforeach
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- EMAIL -->
                    <div class="form-group">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            class="form-input"
                            placeholder="email@contoh.com">

                    </div>

                    <!-- PASSWORD -->
                    <div class="form-group">

                        <label class="form-label">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            class="form-input"
                            placeholder="••••••••">

                    </div>

                    <!-- OPTIONS -->
                    <div class="form-options">

                        <label class="remember">
                            <input type="checkbox" name="remember">
                            Ingat saya
                        </label>

                        @if (Route::has('password.request'))
                        <a
                            href="{{ route('password.request') }}"
                            class="form-link">
                            Lupa password?
                        </a>
                        @endif

                    </div>

                    <!-- BUTTON -->
                    <button
                        type="submit"
                        class="btn">

                        Masuk ke Dashboard

                    </button>

                </form>

            </div>

            <!-- FOOTER -->
            @if (Route::has('register'))
            <div class="auth-footer">

                Belum punya akun?

                <a
                    href="{{ route('register') }}"
                    class="auth-link">

                    Daftar sekarang

                </a>

            </div>
            @endif

        </div>

    </div>

</body>

</html>