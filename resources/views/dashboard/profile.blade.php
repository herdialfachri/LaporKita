<x-layout>
  <x-slot:breadcrumb>
    <li>Dashboard</li>
    <li>Profil Saya</li>
    </x-slot>

    {{-- SUCCESS --}}
    @if (session('status') === 'profile-updated')
    <div class="alert-success-custom">
      Profil berhasil diperbarui.
    </div>
    @endif

    @if (session('status') === 'verification-link-sent')
    <div class="alert-warning-custom">
      Email berubah. Link verifikasi baru telah dikirim.
    </div>
    @endif

    {{-- CARD --}}
    <div class="staff-card">

      {{-- HEADER --}}
      <div class="staff-card-header">
        <i class="mdi mdi-account-circle"></i>
        <span>Profil Saya</span>
      </div>

      <div style="padding:1.5rem;">

        {{-- TOP --}}
        <div class="profile-top">

          <img
            src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=E8B14C&color=07213e&rounded=true&size=100"
            alt="{{ auth()->user()->name }}"
            class="profile-avatar">

          <div>

            <h2 class="profile-name">
              {{ auth()->user()->name }}
            </h2>

            <p class="profile-email">
              {{ auth()->user()->email }}
            </p>

            <div class="profile-badges">

              <span class="badge-role">
                {{ ucfirst(auth()->user()->role) }}
              </span>

              @if(auth()->user()->hasVerifiedEmail())
              <span class="badge-verified">
                <i class="mdi mdi-check-decagram"></i>
                Terverifikasi
              </span>
              @else
              <span class="badge-unverified">
                <i class="mdi mdi-alert-circle"></i>
                Belum Terverifikasi
              </span>
              @endif

            </div>

          </div>

        </div>

        {{-- FORM --}}
        <form method="POST"
          action="{{ route(request()->routeIs('admin.*') ? 'admin.profile.update' : (request()->routeIs('staff.*') ? 'staff.profile.update' : 'dashboard.profile.update')) }}">

          @csrf
          @method('PATCH')

          {{-- PROFILE DATA --}}
          <div class="section-title">
            <i class="mdi mdi-account-edit"></i>
            <span>Informasi Profil</span>
          </div>

          <div class="form-grid">

            {{-- NAMA --}}
            <div class="form-group-custom">
              <label>Nama</label>

              <input
                type="text"
                name="name"
                value="{{ old('name', auth()->user()->name) }}"
                required
                class="form-input">

              @error('name')
              <p class="form-error">{{ $message }}</p>
              @enderror
            </div>

            {{-- EMAIL --}}
            <div class="form-group-custom">
              <label>Email</label>

              <input
                type="email"
                name="email"
                value="{{ old('email', auth()->user()->email) }}"
                required
                class="form-input">

              @error('email')
              <p class="form-error">{{ $message }}</p>
              @enderror
            </div>

            {{-- IDENTITAS --}}
            <div class="form-group-custom">
              <label>NIP/NIDN/NUPTK/NIS/NIM</label>

              <input
                type="text"
                name="identity_number"
                value="{{ old('identity_number', auth()->user()->identity_number) }}"
                class="form-input">

              @error('identity_number')
              <p class="form-error">{{ $message }}</p>
              @enderror
            </div>

            {{-- PHONE --}}
            <div class="form-group-custom">
              <label>Nomor Telepon</label>

              <input
                type="text"
                name="phone"
                value="{{ old('phone', auth()->user()->phone) }}"
                class="form-input">

              @error('phone')
              <p class="form-error">{{ $message }}</p>
              @enderror
            </div>

            {{-- INSTANSI --}}
            <div class="form-group-custom">
              <label>Instansi</label>

              <input
                type="text"
                name="institution"
                value="{{ old('institution', auth()->user()->institution) }}"
                class="form-input">

              @error('institution')
              <p class="form-error">{{ $message }}</p>
              @enderror
            </div>

            {{-- ROLE --}}
            <div class="form-group-custom">
              <label>Role</label>

              <input
                type="text"
                readonly
                value="{{ ucfirst(auth()->user()->role) }}"
                class="form-input readonly-input">
            </div>

          </div>

          {{-- ADDRESS --}}
          <div class="form-group-custom" style="margin-top:1rem;">

            <label>Alamat</label>

            <textarea
              name="address"
              rows="4"
              class="form-textarea">{{ old('address', auth()->user()->address) }}</textarea>

            @error('address')
            <p class="form-error">{{ $message }}</p>
            @enderror

          </div>

          {{-- PASSWORD --}}
          <div style="margin-top:2rem;">

            <div class="section-title">
              <i class="mdi mdi-lock-reset"></i>
              <span>Ganti Password</span>
            </div>

            <div class="form-grid">

              {{-- CURRENT --}}
              <div class="form-group-custom">

                <label>Password Saat Ini</label>

                <input
                  type="password"
                  name="current_password"
                  autocomplete="current-password"
                  class="form-input">

                @error('current_password')
                <p class="form-error">{{ $message }}</p>
                @enderror

              </div>

              {{-- NEW --}}
              <div class="form-group-custom">

                <label>Password Baru</label>

                <input
                  type="password"
                  name="password"
                  autocomplete="new-password"
                  class="form-input">

                @error('password')
                <p class="form-error">{{ $message }}</p>
                @enderror

              </div>

              {{-- CONFIRM --}}
              <div class="form-group-custom">

                <label>Konfirmasi Password</label>

                <input
                  type="password"
                  name="password_confirmation"
                  autocomplete="new-password"
                  class="form-input">

              </div>

            </div>

          </div>

          {{-- BUTTON --}}
          <div class="button-wrapper">

            <button type="submit" class="btn-submit">
              <i class="mdi mdi-content-save"></i>
              Simpan Perubahan
            </button>

          </div>

        </form>

      </div>

    </div>

    {{-- STYLE --}}
    <style>
      .alert-success-custom,
      .alert-warning-custom {
        border-radius: 10px;
        padding: .85rem 1rem;
        margin-bottom: 1.2rem;
        font-size: .82rem;
        font-weight: 500;
      }

      .alert-success-custom {
        background: #dcfce7;
        border-left: 4px solid #16a34a;
        color: #166534;
      }

      .alert-warning-custom {
        background: #fef3c7;
        border-left: 4px solid #f59e0b;
        color: #92400e;
      }

      .profile-top {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
      }

      .profile-avatar {
        width: 82px;
        height: 82px;
        border-radius: 50%;
        object-fit: cover;
      }

      .profile-name {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--navy);
        margin-bottom: .2rem;
      }

      .profile-email {
        font-size: .82rem;
        color: #64748b;
        margin-bottom: .5rem;
      }

      .profile-badges {
        display: flex;
        align-items: center;
        gap: .5rem;
        flex-wrap: wrap;
      }

      .badge-role,
      .badge-verified,
      .badge-unverified {
        display: inline-flex;
        align-items: center;
        gap: .3rem;
        padding: .35rem .7rem;
        border-radius: 999px;
        font-size: .72rem;
        font-weight: 600;
      }

      .badge-role {
        background: #eff6ff;
        color: #1d4ed8;
      }

      .badge-verified {
        background: #dcfce7;
        color: #166534;
      }

      .badge-unverified {
        background: #fee2e2;
        color: #991b1b;
      }

      .section-title {
        display: flex;
        align-items: center;
        gap: .5rem;
        margin-bottom: 1rem;
        font-size: .92rem;
        font-weight: 700;
        color: var(--navy);
      }

      .form-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1rem;
      }

      .form-group-custom label {
        display: block;
        font-size: .78rem;
        font-weight: 600;
        color: var(--navy);
        margin-bottom: .45rem;
      }

      .form-input,
      .form-textarea {
        width: 100%;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        font-size: .84rem;
        outline: none;
        transition: .2s;
        background: #fff;
      }

      .form-input {
        height: 42px;
        padding: .5rem .85rem;
      }

      .form-textarea {
        padding: .75rem;
        resize: none;
      }

      .form-input:focus,
      .form-textarea:focus {
        border-color: #e8b14c;
        box-shadow: 0 0 0 3px rgba(232, 177, 76, .15);
      }

      .readonly-input {
        background: #f8fafc;
        color: #64748b;
      }

      .form-error {
        font-size: .72rem;
        color: #dc2626;
        margin-top: .35rem;
      }

      .button-wrapper {
        display: flex;
        justify-content: flex-end;
        margin-top: 2rem;
      }

      @media(max-width: 992px) {
        .form-grid {
          grid-template-columns: repeat(2, minmax(0, 1fr));
        }
      }

      @media(max-width: 640px) {
        .form-grid {
          grid-template-columns: repeat(1, minmax(0, 1fr));
        }
      }
    </style>

</x-layout>