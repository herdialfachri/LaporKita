<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar | LaporKita</title>
    <link rel="stylesheet" href="{{ asset('src/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('src/img/favicon.jpg') }}">
</head>

<body class="text-gray-700" style="background: #f8f8f8; min-height: 100vh; display: flex; flex-direction: column;">

    <!-- MAIN -->
    <main style="flex: 1; display: flex; align-items: center; justify-content: center; padding: 3rem 1rem;">
        <div style="width: 100%; max-width: 420px;">

            <!-- Card -->
            <div style="background: #fff; border: 1px solid #efefef;">

                <!-- Card Header -->
                <div style="background: #f8f8f8; padding: 1.5rem; text-align: center; border-bottom: 1px solid #efefef;">
                    <h1 style="color: #1c1c1c; font-size: 1.25rem; font-weight: 700; margin: 0;">Buat Akun Baru</h1>
                    <p style="color: #7d7d7d; font-size: 0.8rem; margin-top: 0.3rem;">Daftar untuk mengakses layanan</p>
                </div>

                <!-- Card Body -->
                <div style="padding: 2rem;">

                    {{-- Error --}}
                    @if ($errors->any())
                    <div style="background: #fef2f2; border-left: 3px solid #dc2626; padding: 0.75rem 1rem; margin-bottom: 1rem; font-size: 0.85rem; color: #dc2626;">
                        @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                        @endforeach
                    </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Nama -->
                        <div style="margin-bottom: 1.25rem;">
                            <label for="name" style="display: block; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: #1c1c1c; margin-bottom: 0.4rem;">
                                Nama Lengkap
                            </label>
                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                autocomplete="name"
                                style="width: 100%; padding: 0.6rem 0.875rem; border: 1px solid #e0e0e0; font-size: 0.875rem; font-family: Roboto, sans-serif; color: #1c1c1c; outline: none; box-sizing: border-box;"
                                onfocus="this.style.borderColor='#dc2626'"
                                onblur="this.style.borderColor='#e0e0e0'"
                                placeholder="Nama lengkap Anda">
                        </div>

                        <!-- Email -->
                        <div style="margin-bottom: 1.25rem;">
                            <label for="email" style="display: block; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: #1c1c1c; margin-bottom: 0.4rem;">
                                Email
                            </label>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="username"
                                style="width: 100%; padding: 0.6rem 0.875rem; border: 1px solid #e0e0e0; font-size: 0.875rem; font-family: Roboto, sans-serif; color: #1c1c1c; outline: none; box-sizing: border-box;"
                                onfocus="this.style.borderColor='#dc2626'"
                                onblur="this.style.borderColor='#e0e0e0'"
                                placeholder="email@contoh.com">
                        </div>

                        <!-- Password -->
                        <div style="margin-bottom: 1.25rem;">
                            <label for="password" style="display: block; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: #1c1c1c; margin-bottom: 0.4rem;">
                                Password
                            </label>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                style="width: 100%; padding: 0.6rem 0.875rem; border: 1px solid #e0e0e0; font-size: 0.875rem; font-family: Roboto, sans-serif; color: #1c1c1c; outline: none; box-sizing: border-box;"
                                onfocus="this.style.borderColor='#dc2626'"
                                onblur="this.style.borderColor='#e0e0e0'"
                                placeholder="••••••••">
                        </div>

                        <!-- Konfirmasi Password -->
                        <div style="margin-bottom: 1.5rem;">
                            <label for="password_confirmation" style="display: block; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: #1c1c1c; margin-bottom: 0.4rem;">
                                Konfirmasi Password
                            </label>
                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                style="width: 100%; padding: 0.6rem 0.875rem; border: 1px solid #e0e0e0; font-size: 0.875rem; font-family: Roboto, sans-serif; color: #1c1c1c; outline: none; box-sizing: border-box;"
                                onfocus="this.style.borderColor='#dc2626'"
                                onblur="this.style.borderColor='#e0e0e0'"
                                placeholder="••••••••">
                        </div>

                        <!-- Submit -->
                        <button
                            type="submit"
                            style="width: 100%; background: #dc2626; color: #fff; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; padding: 0.75rem; border: none; cursor: pointer; font-family: Roboto, sans-serif; transition: background 0.2s;"
                            onmouseover="this.style.background='#b91c1c'"
                            onmouseout="this.style.background='#dc2626'">
                            Daftar Sekarang &rarr;
                        </button>

                    </form>
                </div>

                <!-- Card Footer -->
                <div style="padding: 1rem 2rem; border-top: 1px solid #efefef; text-align: center; font-size: 0.8rem; color: #7d7d7d;">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" style="color: #dc2626; font-weight: 700; text-decoration: none;">Masuk sekarang</a>
                </div>

            </div>

        </div>
    </main>

</body>

</html>