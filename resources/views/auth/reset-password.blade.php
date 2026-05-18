<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reset Password | SiPenapasJabar</title>

    <link rel="icon" href="{{ asset('assets/landing_page/src/img/kemenkumham.png') }}">

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- AUTH CSS -->
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
                    Reset Password
                </h1>

                <p class="auth-subtitle">
                    Masukkan password baru untuk akun Anda
                </p>

            </div>

            <!-- BODY -->
            <div class="auth-body">

                {{-- ERROR --}}
                @if ($errors->any())
                <div class="alert alert-error">
                    @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                    @endforeach
                </div>
                @endif

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- TOKEN -->
                    <input
                        type="hidden"
                        name="token"
                        value="{{ $request->route('token') }}">

                    <!-- EMAIL -->
                    <div class="form-group">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $request->email) }}"
                            required
                            autofocus
                            autocomplete="username"
                            class="form-input"
                            placeholder="email@contoh.com">

                    </div>

                    <!-- PASSWORD -->
                    <div class="form-group">

                        <label class="form-label">
                            Password Baru
                        </label>

                        <input
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            class="form-input"
                            placeholder="Masukkan password baru">

                    </div>

                    <!-- CONFIRM PASSWORD -->
                    <div class="form-group">

                        <label class="form-label">
                            Konfirmasi Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            class="form-input"
                            placeholder="Konfirmasi password baru">

                    </div>

                    <!-- BUTTON -->
                    <button
                        type="submit"
                        class="btn">

                        Reset Password

                    </button>

                </form>

            </div>

            <!-- FOOTER -->
            <div class="auth-footer">

                Sudah ingat password?

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