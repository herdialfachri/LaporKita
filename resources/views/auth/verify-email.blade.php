<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Verifikasi Email | LaporKita</title>

    <link rel="icon" href="{{ asset('assets/landing_page/src/img/favicon.jpg') }}">

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
                    Verifikasi Email
                </h1>

                <p class="auth-subtitle">
                    Kami telah mengirim link verifikasi ke email Anda.
                    Silakan cek inbox lalu klik link verifikasi untuk melanjutkan.
                </p>

            </div>

            <!-- BODY -->
            <div class="auth-body">

                {{-- STATUS --}}
                @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success">
                    Link verifikasi baru berhasil dikirim ke email Anda.
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

                {{-- RESEND --}}
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <button
                        type="submit"
                        class="btn">

                        Kirim Ulang Verifikasi

                    </button>
                </form>

            </div>

            <!-- FOOTER -->
            <div class="auth-footer">

                Bukan akun Anda?

                <form method="POST"
                    action="{{ route('logout') }}"
                    style="display:inline;">
                    @csrf

                    <button
                        type="submit"
                        style="background:none;border:none;padding:0;margin:0;cursor:pointer;"
                        class="auth-link">

                        Keluar

                    </button>
                </form>

            </div>

        </div>

    </div>

</body>

</html>