<x-layout>
  <x-slot:breadcrumb>
    <li>Dashboard</li>
    <li>Pengajuan</li>
    <li>Buat Pengajuan</li>
    </x-slot>

    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-file-plus"></i></span>
          Buat Pengajuan
        </p>
      </header>
      <div class="card-content">

        @if ($errors->any())
        <div class="notification red mb-4">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('dashboard.submissions.store') }}" enctype="multipart/form-data">
          @csrf

          {{-- Jenis Pengajuan --}}
          <div class="field">
            <label class="label">Jenis Pengajuan</label>
            <div class="control">
              <div class="select">
                <select name="type" required>
                  <option value="">-- Pilih Jenis --</option>
                  <option value="magang" {{ old('type') === 'magang' ? 'selected' : '' }}>Magang</option>
                  <option value="pkl" {{ old('type') === 'pkl' ? 'selected' : '' }}>PKL</option>
                  <option value="penelitian" {{ old('type') === 'penelitian' ? 'selected' : '' }}>Penelitian</option>
                </select>
              </div>
            </div>
          </div>

          {{-- Judul --}}
          <div class="field">
            <label class="label">Judul Pengajuan</label>
            <div class="control icons-left">
              <input class="input" type="text" name="title" value="{{ old('title') }}" placeholder="Judul pengajuan" required>
              <span class="icon left"><i class="mdi mdi-format-title"></i></span>
            </div>
          </div>

          {{-- Lokasi --}}
          <div class="field">
            <label class="label">Lokasi</label>
            <div class="control icons-left">
              <input class="input" type="text" name="location" value="{{ old('location') }}" placeholder="Lokasi kegiatan" required>
              <span class="icon left"><i class="mdi mdi-map-marker"></i></span>
            </div>
          </div>

          {{-- Tanggal --}}
          <div class="field">
            <label class="label">Tanggal Kegiatan</label>
            <div class="field-body">
              <div class="field">
                <label class="label is-small">Mulai</label>
                <div class="control">
                  <input class="input" type="date" name="start_date" value="{{ old('start_date') }}">
                </div>
              </div>
              <div class="field">
                <label class="label is-small">Selesai</label>
                <div class="control">
                  <input class="input" type="date" name="end_date" value="{{ old('end_date') }}">
                </div>
              </div>
            </div>
          </div>

          {{-- Deskripsi --}}
          <div class="field">
            <label class="label">Deskripsi</label>
            <div class="control">
              <textarea class="textarea" name="description" placeholder="Jelaskan tujuan dan detail pengajuan">{{ old('description') }}</textarea>
            </div>
          </div>

          {{-- Upload Dokumen --}}
          <div class="field">
            <label class="label">Dokumen (PDF, maks. 5MB)</label>
            <div class="control">
              <input class="input" type="file" name="document_file" accept=".pdf" required>
            </div>
            <p class="help">Unggah dokumen pengajuan dalam format PDF</p>
          </div>

          <hr>

          <div class="field grouped">
            <div class="control">
              <button type="submit" class="button green">
                <span class="icon"><i class="mdi mdi-send"></i></span>
                <span>Kirim Pengajuan</span>
              </button>
            </div>
            <div class="control">
              <a href="{{ route('dashboard.submissions') }}" class="button red">
                <span class="icon"><i class="mdi mdi-cancel"></i></span>
                <span>Batal</span>
              </a>
            </div>
          </div>

        </form>
      </div>
    </div>

</x-layout>