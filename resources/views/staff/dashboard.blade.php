<x-layout>
  <x-slot:breadcrumb>
    <li>Dashboard Staff</li>
    </x-slot>

    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-file-document"></i></span>
          Daftar Pengajuan User
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
              <td>{{ $submission->start_date }}</td>
              <td>{{ $submission->end_date }}</td>
              <td>
                @switch($submission->status)
                @case('submitted') Diajukan @break
                @case('revision') Revisi @break
                @case('verified') Terverifikasi @break
                @case('in_review') Sedang Ditinjau @break
                @case('approved') Disetujui @break
                @case('rejected') Ditolak @break
                @endswitch
              </td>
              <td>
                <form action="{{ route('staff.submissions.update', $submission->id) }}" method="POST">
                  @csrf
                  @method('PATCH')

                  <select name="status" class="form-select">
                    <option value="" disabled selected>Pilih Status</option>
                    <option value="revision" @selected($submission->status=='revision')>Revisi</option>
                    <option value="verified" @selected($submission->status=='verified')>Terverifikasi</option>
                    <option value="in_review" @selected($submission->status=='in_review')>Sedang Ditinjau</option>
                  </select>

                  <select name="assigned_division_id" class="form-select">
                    <option value="" disabled selected>Pilih Divisi</option>
                    @foreach($divisions as $division)
                    <option value="{{ $division->id }}" @selected($submission->assigned_division_id == $division->id)>
                      {{ $division->name }}
                    </option>
                    @endforeach
                  </select>

                  <button type="submit" class="button small green">Disposisi</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</x-layout>