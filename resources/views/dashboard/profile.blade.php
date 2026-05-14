<x-layout>
  <x-slot:breadcrumb>
    <li>Dashboard</li>
    <li>Profil Saya</li>
    </x-slot>

    {{-- SUCCESS --}}
    @if (session('status') === 'profile-updated')
    <div style="background:#dcfce7;border-left:4px solid #16a34a;border-radius:10px;padding:.85rem 1rem;margin-bottom:1.2rem;font-size:.82rem;color:#166534;">
      Profil berhasil diperbarui.
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

        {{-- PROFILE TOP --}}
        <div style="display:flex;align-items:center;gap:1rem;margin-bottom:2rem;flex-wrap:wrap;">

          <img
            src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=E8B14C&color=07213e&rounded=true&size=100"
            alt="{{ auth()->user()->name }}"
            style="width:80px;height:80px;border-radius:50%;object-fit:cover;">

          <div>
            <h2 style="font-size:1.1rem;font-weight:700;color:var(--navy);margin-bottom:.2rem;">
              {{ auth()->user()->name }}
            </h2>

            <p style="font-size:.82rem;color:#64748b;margin-bottom:.2rem;">
              {{ auth()->user()->email }}
            </p>

          </div>

        </div>

        {{-- FORM --}}
        <form method="POST"
          action="{{ route(request()->routeIs('admin.*') ? 'admin.profile.update' : (request()->routeIs('staff.*') ? 'staff.profile.update' : 'dashboard.profile.update')) }}">

          @csrf
          @method('PATCH')

          {{-- GRID --}}
          <div style="display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:1rem;">

            {{-- NAMA --}}
            <div>
              <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.45rem;">
                Nama
              </label>

              <input type="text"
                name="name"
                value="{{ old('name', auth()->user()->name) }}"
                required
                class="form-input">

              @error('name')
              <p style="font-size:.72rem;color:#dc2626;margin-top:.35rem;">{{ $message }}</p>
              @enderror
            </div>

            {{-- EMAIL --}}
            <div>
              <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.45rem;">
                Email
              </label>

              <input type="email"
                name="email"
                value="{{ old('email', auth()->user()->email) }}"
                required
                class="form-input">

              @error('email')
              <p style="font-size:.72rem;color:#dc2626;margin-top:.35rem;">{{ $message }}</p>
              @enderror
            </div>

            {{-- IDENTITAS --}}
            <div>
              <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.45rem;">
                NIP/NIDN/NUPTK/NIS/NIM
              </label>

              <input type="text"
                name="identity_number"
                value="{{ old('identity_number', auth()->user()->identity_number) }}"
                class="form-input">

              @error('identity_number')
              <p style="font-size:.72rem;color:#dc2626;margin-top:.35rem;">{{ $message }}</p>
              @enderror
            </div>

            {{-- PHONE --}}
            <div>
              <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.45rem;">
                Nomor Telepon
              </label>

              <input type="text"
                name="phone"
                value="{{ old('phone', auth()->user()->phone) }}"
                class="form-input">

              @error('phone')
              <p style="font-size:.72rem;color:#dc2626;margin-top:.35rem;">{{ $message }}</p>
              @enderror
            </div>

            {{-- INSTANSI --}}
            <div>
              <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.45rem;">
                Instansi
              </label>

              <input type="text"
                name="institution"
                value="{{ old('institution', auth()->user()->institution) }}"
                class="form-input">

              @error('institution')
              <p style="font-size:.72rem;color:#dc2626;margin-top:.35rem;">{{ $message }}</p>
              @enderror
            </div>

            {{-- ROLE --}}
            <div>
              <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.45rem;">
                Role
              </label>

              <input type="text"
                readonly
                value="{{ ucfirst(auth()->user()->role) }}"
                class="form-input"
                style="background:#f8fafc;color:#64748b;">
            </div>

          </div>

          {{-- ADDRESS --}}
          <div style="margin-top:1rem;">

            <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.45rem;">
              Alamat
            </label>

            <textarea
              name="address"
              rows="4"
              class="form-input"
              style="resize:none;padding:.75rem;">{{ old('address', auth()->user()->address) }}</textarea>

            @error('address')
            <p style="font-size:.72rem;color:#dc2626;margin-top:.35rem;">{{ $message }}</p>
            @enderror

          </div>

          {{-- PASSWORD --}}
          <div style="margin-top:2rem;">

            <div style="display:flex;align-items:center;gap:.5rem;margin-bottom:1rem;">
              <i class="mdi mdi-lock" style="font-size:1rem;color:var(--gold);"></i>

              <h3 style="font-size:.92rem;font-weight:700;color:var(--navy);margin:0;">
                Ganti Password
              </h3>
            </div>

            <div style="display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:1rem;">

              {{-- CURRENT --}}
              <div>
                <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.45rem;">
                  Password Saat Ini
                </label>

                <input type="password"
                  name="current_password"
                  autocomplete="current-password"
                  class="form-input">

                @error('current_password')
                <p style="font-size:.72rem;color:#dc2626;margin-top:.35rem;">{{ $message }}</p>
                @enderror
              </div>

              {{-- NEW --}}
              <div>
                <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.45rem;">
                  Password Baru
                </label>

                <input type="password"
                  name="password"
                  autocomplete="new-password"
                  class="form-input">

                @error('password')
                <p style="font-size:.72rem;color:#dc2626;margin-top:.35rem;">{{ $message }}</p>
                @enderror
              </div>

              {{-- CONFIRM --}}
              <div>
                <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.45rem;">
                  Konfirmasi Password
                </label>

                <input type="password"
                  name="password_confirmation"
                  autocomplete="new-password"
                  class="form-input">
              </div>

            </div>

          </div>

          {{-- BUTTON --}}
          <div style="margin-top:2rem;display:flex;justify-content:flex-end;">

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
      .form-input {
        width: 100%;
        height: 42px;
        padding: .5rem .85rem;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        font-size: .84rem;
        outline: none;
        transition: .2s;
        background: #fff;
      }

      .form-input:focus {
        border-color: #e8b14c;
        box-shadow: 0 0 0 3px rgba(232, 177, 76, .15);
      }

      @media(max-width: 992px) {
        div[style*="grid-template-columns:repeat(3"] {
          grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
        }
      }

      @media(max-width: 640px) {
        div[style*="grid-template-columns:repeat(3"] {
          grid-template-columns: repeat(1, minmax(0, 1fr)) !important;
        }
      }
    </style>

</x-layout>