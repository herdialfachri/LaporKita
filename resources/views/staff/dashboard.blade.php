<x-layout>
  <x-slot:breadcrumb>
    <li>Dashboard Staff</li>
    </x-slot>

    {{-- ================= SUBMISSION ================= --}}
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon">
            <i class="mdi mdi-file-document"></i>
          </span>

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
              <th>Divisi</th>
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

                @case('submitted')
                <span class="badge blue">
                  Diajukan
                </span>
                @break

                @case('revision')
                <span class="badge red">
                  Revisi
                </span>
                @break

                @case('verified')
                <span class="badge yellow">
                  Terverifikasi
                </span>
                @break

                @case('in_review')
                <span class="badge blue">
                  Sedang Ditinjau
                </span>
                @break

                @case('approved')
                <span class="badge green">
                  Disetujui
                </span>
                @break

                @case('rejected')
                <span class="badge red">
                  Ditolak
                </span>
                @break

                @endswitch
              </td>

              <td>
                {{ $submission->division->name ?? '-' }}
              </td>

              <td>
                <form action="{{ route('staff.submissions.update', $submission->id) }}"
                  method="POST">

                  @csrf
                  @method('PATCH')

                  <select name="status"
                    class="form-select"
                    required>

                    <option value="" disabled selected>
                      Pilih Status
                    </option>

                    <option value="revision">
                      Revisi
                    </option>

                    <option value="verified">
                      Terverifikasi
                    </option>

                    <option value="in_review">
                      Sedang Ditinjau
                    </option>

                  </select>

                  <select name="assigned_division_id"
                    class="form-select"
                    required>

                    <option value="" disabled selected>
                      Pilih Divisi
                    </option>

                    @foreach($divisions as $division)

                    <option value="{{ $division->id }}">
                      {{ $division->name }}
                    </option>

                    @endforeach

                  </select>

                  <button type="submit"
                    class="button small green">
                    Disposisi
                  </button>

                </form>
              </td>

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>


    {{-- ================= COMPLAINT ================= --}}
    <div class="card has-table mt-5">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon">
            <i class="mdi mdi-alert-circle"></i>
          </span>

          Daftar Pengaduan User
        </p>
      </header>

      <div class="card-content">
        <table>
          <thead>
            <tr>
              <th>Kode</th>
              <th>Judul</th>
              <th>Kategori</th>
              <th>Staff Penanggung Jawab</th>
              <th>Status</th>
              <th>Feedback Admin</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            @foreach($complaints as $complaint)
            <tr>

              <td>{{ $complaint->complaint_code }}</td>

              <td>{{ $complaint->title }}</td>

              <td>{{ ucfirst($complaint->category) }}</td>

              <td>
                {{ $complaint->assignedStaff->name ?? '-' }}
              </td>

              <td>
                @switch($complaint->status)

                @case('submitted')
                <span class="badge blue">
                  Diajukan
                </span>
                @break

                @case('in_review')
                <span class="badge yellow">
                  Sedang Ditinjau
                </span>
                @break

                @case('responded')
                <span class="badge green">
                  Ditanggapi
                </span>
                @break

                @case('closed')
                <span class="badge red">
                  Ditutup
                </span>
                @break

                @endswitch
              </td>

              <td>
                {{ $complaint->admin_feedback ?? '-' }}
              </td>

              <td>
                <form action="{{ route('staff.complaints.update', $complaint->id) }}"
                  method="POST">

                  @csrf
                  @method('PATCH')

                  <select name="status"
                    class="form-select"
                    required>

                    <option value="" disabled selected>
                      Pilih Status
                    </option>

                    <option value="in_review">
                      Sedang Ditinjau
                    </option>

                    <option value="responded">
                      Ditanggapi
                    </option>

                    <option value="closed">
                      Ditutup
                    </option>

                  </select>

                  <button type="submit"
                    class="button small green">
                    Update
                  </button>

                </form>
              </td>

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

</x-layout>