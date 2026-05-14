<x-layout>
  <x-slot:breadcrumb>
    <li>Dashboard</li>
    <li>Profil Saya</li>
    </x-slot>

    @if (session('status') === 'profile-updated')
    <div style="background:#dcfce7;border-left:4px solid #16a34a;border-radius:8px;padding:.8rem 1rem;margin-bottom:1rem;font-size:.82rem;color:#166534;">
      Profil berhasil diperbarui.
    </div>
    @endif

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:1.5rem;margin-bottom:1.5rem;">

      {{-- EDIT PROFILE --}}
      <div class="staff-card">
        <div class="staff-card-header">
          <i class="mdi mdi-account-circle"></i>
          <span>Edit Profil</span>
        </div>
        <div style="padding:1.5rem;">
          <form method="POST" action="{{ route('dashboard.profile.update') }}">
            @csrf
            @method('PATCH')
            <div style="margin-bottom:1rem;">
              <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.4rem;">Nama</label>
              <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" autocomplete="on" required style="width:100%;padding:.5rem .75rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;outline:none;">
              @error('name') <p style="font-size:.72rem;color:#991b1b;margin-top:.3rem;">{{ $message }}</p> @enderror
            </div>
            <div style="margin-bottom:1.5rem;">
              <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.4rem;">Email</label>
              <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" autocomplete="on" required style="width:100%;padding:.5rem .75rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;outline:none;">
              @error('email') <p style="font-size:.72rem;color:#991b1b;margin-top:.3rem;">{{ $message }}</p> @enderror
            </div>
            <hr style="border:none;border-top:1px solid #e2e8f0;margin-bottom:1.2rem;">
            <button type="submit" class="btn-submit">
              <i class="mdi mdi-content-save"></i> Simpan Perubahan
            </button>
          </form>
        </div>
      </div>

      {{-- PROFILE --}}
      <div class="staff-card">
        <div class="staff-card-header">
          <i class="mdi mdi-account"></i>
          <span>Profil</span>
        </div>
        <div style="padding:1.5rem;text-align:center;">
          <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=E8B14C&color=07213e&rounded=true&size=100" alt="{{ auth()->user()->name }}" style="width:100px;height:100px;border-radius:50%;margin:0 auto 1rem;">
          <hr style="border:none;border-top:1px solid #e2e8f0;margin-bottom:1rem;">
          <div style="margin-bottom:1rem;text-align:left;">
            <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.4rem;">Nama</label>
            <input type="text" readonly value="{{ auth()->user()->name }}" style="width:100%;padding:.5rem .75rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;background:#f8fafd;color:#64748b;">
          </div>
          <div style="margin-bottom:1rem;text-align:left;">
            <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.4rem;">Email</label>
            <input type="text" readonly value="{{ auth()->user()->email }}" style="width:100%;padding:.5rem .75rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;background:#f8fafd;color:#64748b;">
          </div>
          <div style="text-align:left;">
            <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.4rem;">Role</label>
            <input type="text" readonly value="{{ ucfirst(auth()->user()->role) }}" style="width:100%;padding:.5rem .75rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;background:#f8fafd;color:#64748b;">
          </div>
        </div>
      </div>

    </div>

    {{-- CHANGE PASSWORD --}}
    <div class="staff-card">
      <div class="staff-card-header">
        <i class="mdi mdi-lock"></i>
        <span>Ganti Password</span>
      </div>
      <div style="padding:1.5rem;">
        <form method="POST" action="{{ route('password.update') }}">
          @csrf
          @method('PUT')
          <div style="margin-bottom:1rem;">
            <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.4rem;">Password Saat Ini</label>
            <input type="password" name="current_password" autocomplete="current-password" required style="width:100%;padding:.5rem .75rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;outline:none;">
            @error('current_password') <p style="font-size:.72rem;color:#991b1b;margin-top:.3rem;">{{ $message }}</p> @enderror
          </div>
          <div style="margin-bottom:1rem;">
            <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.4rem;">Password Baru</label>
            <input type="password" name="password" autocomplete="new-password" required style="width:100%;padding:.5rem .75rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;outline:none;">
            @error('password') <p style="font-size:.72rem;color:#991b1b;margin-top:.3rem;">{{ $message }}</p> @enderror
          </div>
          <div style="margin-bottom:1.5rem;">
            <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.4rem;">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" autocomplete="new-password" required style="width:100%;padding:.5rem .75rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;outline:none;">
          </div>
          <hr style="border:none;border-top:1px solid #e2e8f0;margin-bottom:1.2rem;">
          <button type="submit" class="btn-submit">
            <i class="mdi mdi-lock-reset"></i> Ganti Password
          </button>
        </form>
      </div>
    </div>

</x-layout>