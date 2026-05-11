<x-layout>

  <x-slot:breadcrumb>
    <li>Dashboard</li>
    <li>Pengaduan</li>
    <li>Buat Pengaduan</li>
    </x-slot>

    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon">
            <i class="mdi mdi-alert-circle"></i>
          </span>

          Form Pengaduan
        </p>
      </header>

      <div class="card-content">

        @if ($errors->any())
        <div class="notification red">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form
          method="POST"
          action="{{ route('dashboard.complaints.store') }}"
          enctype="multipart/form-data">

          @csrf

          <div class="field">
            <label class="label">Judul Pengaduan</label>

            <div class="control">
              <input
                class="input"
                type="text"
                name="title"
                value="{{ old('title') }}"
                placeholder="Masukkan judul pengaduan">
            </div>
          </div>

          <div class="field">
            <label class="label">Kategori</label>

            <div class="control">
              <div class="select">
                <select name="category">
                  <option value="">Pilih kategori</option>

                  <option value="pelayanan">Pelayanan</option>
                  <option value="petugas">Petugas</option>
                  <option value="fasilitas">Fasilitas</option>
                  <option value="website">Website</option>
                  <option value="lainnya">Lainnya</option>
                </select>
              </div>
            </div>
          </div>

          <div class="field">
            <label class="label">Deskripsi Pengaduan</label>

            <div class="control">
              <textarea
                class="textarea"
                name="description"
                placeholder="Jelaskan pengaduan anda">{{ old('description') }}</textarea>
            </div>
          </div>

          <div class="field">
            <label class="label">Upload Bukti</label>

            <div class="control">
              <input
                class="input"
                type="file"
                name="evidence_file">
            </div>

            <p class="help">
              Format: JPG, PNG, PDF (Max 5MB)
            </p>
          </div>

          <hr>

          <div class="field grouped">
            <div class="control">
              <button type="submit" class="button green">
                Kirim Pengaduan
              </button>
            </div>

            <div class="control">
              <button type="reset" class="button red">
                Reset
              </button>
            </div>
          </div>

        </form>
      </div>
    </div>

</x-layout>