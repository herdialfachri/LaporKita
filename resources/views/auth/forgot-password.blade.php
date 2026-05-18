<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lupa Password | SiPenapasJabar</title>

    <link rel="icon" href="{{ asset('assets/landing_page/src/img/kemenkumham.png') }}">

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
                    Lupa Password
                </h1>

                <p class="auth-subtitle">
                    Masukkan email Anda untuk menerima link reset password
                </p>

            </div>

            <!-- BODY -->
            <div class="auth-body">

                {{-- SESSION STATUS --}}
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

                <form method="POST" action="{{ route('password.email') }}">
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
                            class="form-input"
                            placeholder="email@contoh.com">

                    </div>

                    <!-- BUTTON -->
                    <button
                        type="submit"
                        class="btn">

                        Kirim Link Reset

                    </button>

                </form>

            </div>

            <!-- FOOTER -->
            <div class="auth-footer">

                Ingat password?

                <a
                    href="{{ route('login') }}"
                    class="auth-link">

                    Masuk sekarang

                </a>

            </div>

        </div>

    </div>

</body>

</html>