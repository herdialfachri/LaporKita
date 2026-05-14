<x-layout>
  <x-slot:breadcrumb>
    <li>Dashboard</li>
    <li>Pengaduan</li>
    <li>Buat Pengaduan</li>
    </x-slot>

    <div class="staff-card">
      <div class="staff-card-header">
        <i class="mdi mdi-alert-circle-outline"></i>
        <span>Form Pengaduan</span>
      </div>

      <div style="padding: 1.5rem;">

        @if ($errors->any())
        <div style="background:#fee2e2;border-left:4px solid #ef4444;border-radius:8px;padding:.8rem 1rem;margin-bottom:1rem;font-size:.82rem;color:#991b1b;">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('dashboard.complaints.store') }}" enctype="multipart/form-data">
          @csrf

          {{-- Judul --}}
          <div style="margin-bottom:1rem;">
            <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.4rem;">Judul Pengaduan</label>
            <input type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan judul pengaduan" style="width:100%;padding:.5rem .75rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;outline:none;">
          </div>

          {{-- Kategori --}}
          <div style="margin-bottom:1rem;">
            <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.4rem;">Kategori</label>
            <select name="category" style="width:100%;padding:.5rem .75rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;color:var(--navy);background:white;outline:none;">
              <option value="">Pilih kategori</option>
              <option value="pelayanan">Pelayanan</option>
              <option value="petugas">Petugas</option>
              <option value="fasilitas">Fasilitas</option>
              <option value="website">Website</option>
              <option value="lainnya">Lainnya</option>
            </select>
          </div>

          {{-- Deskripsi --}}
          <div style="margin-bottom:1rem;">
            <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.4rem;">Deskripsi Pengaduan</label>
            <textarea name="description" rows="4" placeholder="Jelaskan pengaduan anda" style="width:100%;padding:.5rem .75rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;outline:none;resize:vertical;">{{ old('description') }}</textarea>
          </div>

          {{-- Upload --}}
          <div style="margin-bottom:1.5rem;">
            <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.4rem;">Upload Bukti</label>
            <input type="file" name="evidence_file" accept=".jpg,.jpeg,.png,.pdf" style="width:100%;padding:.5rem .75rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;outline:none;background:white;">
            <p style="font-size:.72rem;color:var(--text-soft);margin-top:.3rem;">Format: JPG, PNG, PDF (Max 5MB)</p>
          </div>

          <hr style="border:none;border-top:1px solid #e2e8f0;margin-bottom:1.2rem;">

          <div style="display:flex;gap:.7rem;flex-wrap:wrap;">
            <button type="submit" class="btn-submit">
              <i class="mdi mdi-send"></i> Kirim Pengaduan
            </button>
            <button type="reset" style="display:inline-flex;align-items:center;gap:.3rem;padding:.37rem .85rem;background:#fee2e2;color:#991b1b;border:none;border-radius:7px;font-size:.78rem;font-weight:700;cursor:pointer;">
              <i class="mdi mdi-refresh"></i> Reset
            </button>
          </div>

        </form>
      </div>
    </div>

</x-layout>