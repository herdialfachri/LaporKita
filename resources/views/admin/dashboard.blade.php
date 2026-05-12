<x-layout>
  <x-slot:breadcrumb>
    <li>Dashboard Admin</li>
    </x-slot>

    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-file-document"></i></span>
          Daftar Pengajuan User (Divisi {{ Auth::user()->division->name }}, Status: Verified/Disetujui/Ditolak)
        </p>
      </header>
      <div class="card-content">
        <table>
          <thead>
            <tr>
              <th>Judul</th>
              <th>Jenis</th>
              <th>Lokasi</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
              <th>File</th> <!-- Tambah kolom file -->
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($submissions as $submission)
            <tr>
              <td>{{ $submission->title }}</td>
              <td>{{ ucfirst($submission->type) }}</td>
              <td>{{ $submission->location }}</td>
              <td>{{ $submission->start_date ?? '-' }}</td>
              <td>{{ $submission->end_date ?? '-' }}</td>
              <td>
                @if ($submission->document_file)
                <a href="{{ asset('storage/' . $submission->document_file) }}" target="_blank" class="button small blue">
                  Lihat File
                </a>
                @else
                -
                @endif
              </td>
              <td>
                @if ($submission->status == 'verified')
                <span class="badge yellow">Terverifikasi</span>
                @elseif ($submission->status == 'approved')
                <span class="badge green">Disetujui</span>
                @elseif ($submission->status == 'rejected')
                <span class="badge red">Ditolak</span>
                @elseif ($submission->status == 'submitted')
                <span class="badge blue">Diajukan</span>
                @endif
              </td>
              <td>
                <form action="{{ route('admin.submissions.update', $submission->id) }}" method="POST">
                  @csrf
                  @method('PATCH')

                  <select name="status" class="form-select">
                    <option value="" disabled selected>Pilih Status</option>
                    <option value="approved" @selected($submission->status=='approved')>Disetujui</option>
                    <option value="rejected" @selected($submission->status=='rejected')>Ditolak</option>
                  </select>

                  <textarea name="admin_notes" placeholder="Catatan admin">{{ $submission->admin_notes }}</textarea>

                  <button type="submit" class="button small green">Update</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</x-layout>