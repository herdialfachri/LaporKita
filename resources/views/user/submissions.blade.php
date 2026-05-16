<x-layout>
  <x-slot:breadcrumb>
    <li>Dashboard</li>
    <li>Pengajuan</li>
    <li>Buat Pengajuan</li>
    </x-slot>

    <div class="staff-card">
      <div class="staff-card-header">
        <i class="mdi mdi-file-plus"></i>
        <span>Buat Pengajuan</span>
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

        <form method="POST" action="{{ route('dashboard.submissions.store') }}" enctype="multipart/form-data">
          @csrf

          {{-- Jenis & Judul --}}
          <div style="margin-bottom:1rem;display:flex;gap:1rem;flex-wrap:wrap;">
            <div style="flex:1;min-width:140px;">
              <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.4rem;">Jenis Pengajuan</label>
              <select name="type" required style="width:100%;padding:.5rem .75rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;color:var(--navy);background:white;outline:none;">
                <option value="">--Pilih Jenis Pengajuan--</option>
                <option value="magang" {{ old('type') === 'magang' ? 'selected' : '' }}>Magang</option>
                <option value="pkl" {{ old('type') === 'pkl' ? 'selected' : '' }}>PKL</option>
                <option value="penelitian" {{ old('type') === 'penelitian' ? 'selected' : '' }}>Penelitian</option>
              </select>
            </div>
            <div style="flex:1;min-width:140px;">
              <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.4rem;">Judul Pengajuan</label>
              <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Pengajuan Magang Kerja Lapangan Mahasiswa ITB" required style="width:100%;padding:.5rem .75rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;outline:none;">
            </div>
          </div>

          {{-- Lokasi --}}
          <div style="margin-bottom:1rem;">
            <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.4rem;">Lokasi</label>
            <input type="text" name="location" value="{{ old('location') }}" placeholder="Contoh: Lapas Kelas II Kota Bandung Barat" required style="width:100%;padding:.5rem .75rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;outline:none;">
          </div>

          {{-- Tanggal --}}
          <div style="margin-bottom:1rem;display:flex;gap:1rem;flex-wrap:wrap;">
            <div style="flex:1;min-width:140px;">
              <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.4rem;">Tanggal Mulai</label>
              <input type="date" name="start_date" value="{{ old('start_date') }}" style="width:100%;padding:.5rem .75rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;outline:none;">
            </div>
            <div style="flex:1;min-width:140px;">
              <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.4rem;">Tanggal Selesai</label>
              <input type="date" name="end_date" value="{{ old('end_date') }}" style="width:100%;padding:.5rem .75rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;outline:none;">
            </div>
          </div>

          {{-- Deskripsi --}}
          <div style="margin-bottom:1rem;">
            <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.4rem;">Deskripsi</label>
            <textarea name="description" rows="3" placeholder="Jelaskan tujuan dengan detail serta jelaskan urgensinya" style="width:100%;padding:.5rem .75rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;outline:none;resize:vertical;">{{ old('description') }}</textarea>
          </div>

          {{-- Upload --}}
          <div style="margin-bottom:1.5rem;">
            <label style="display:block;font-size:.78rem;font-weight:600;color:var(--navy);margin-bottom:.4rem;">Dokumen (PDF, maks. 5MB)</label>
            <input type="file" name="document_file" accept=".pdf" required class="file-input">
            <p style="font-size:.72rem;color:var(--text-soft);margin-top:.3rem;">Unggah dokumen pengajuan dalam format PDF</p>
          </div>

          <hr style="border:none;border-top:1px solid #e2e8f0;margin-bottom:1.2rem;">

          <div style="display:flex;gap:.7rem;flex-wrap:wrap;">
            <button type="submit" class="btn-submit">
              <i class="mdi mdi-send"></i> Kirim Pengajuan
            </button>
            <a href="{{ route('dashboard.submissions') }}" class="btn-cancel">
              <i class="mdi mdi-cancel"></i> Reset Formulir
            </a>
          </div>

        </form>
      </div>
    </div>

</x-layout>