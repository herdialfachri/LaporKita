<x-layout>

  <x-slot:breadcrumb>
    <li>Dashboard Pengguna</li>
    </x-slot>

    <div class="card has-table mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon">
            <i class="mdi mdi-file-document"></i>
          </span>
          Data Pengajuan Saya
        </p>
      </header>

      <div class="card-content">
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Jenis</th>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th>Lokasi</th>
              <th>File</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
              <th>Status</th>
              <th>Tanggal Dibuat</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($submissions as $submission)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ strtoupper($submission->type) }}</td>
              <td>{{ $submission->title }}</td>
              <td>{{ $submission->description }}</td>
              <td>{{ $submission->location }}</td>
              <td>
                @if ($submission->document_file)
                <a href="{{ asset('storage/' . $submission->document_file) }}" target="_blank" class="button small blue">
                  Lihat File
                </a>
                @else
                -
                @endif
              </td>
              <td>{{ $submission->start_date ?? '-' }}</td>
              <td>{{ $submission->end_date ?? '-' }}</td>
              <td>
                @if ($submission->status == 'submitted')
                <span class="badge blue">Dikirim</span>
                @elseif ($submission->status == 'revision')
                <span class="badge orange">Revisi</span>
                @elseif ($submission->status == 'verified')
                <span class="badge yellow">Terverifikasi</span>
                @elseif ($submission->status == 'in_review')
                <span class="badge purple">Sedang Ditinjau</span>
                @elseif ($submission->status == 'approved')
                <span class="badge green">Disetujui</span>
                @elseif ($submission->status == 'rejected')
                <span class="badge red">Ditolak</span>
                @endif
              </td>
              <td>{{ $submission->created_at->format('d M Y H:i') }}</td>
            </tr>
            @empty
            <tr>
              <td colspan="10" class="has-text-centered">Belum ada pengajuan</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon">
            <i class="mdi mdi-alert-circle"></i>
          </span>
          Data Pengaduan Saya
        </p>
      </header>

      <div class="card-content">
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Pengaduan</th>
              <th>Judul</th>
              <th>Kategori</th>
              <th>Deskripsi</th>
              <th>File Bukti</th>
              <th>Status</th>
              <th>Feedback Admin</th>
              <th>Tanggal Dibuat</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($complaints as $complaint)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $complaint->complaint_code }}</td>
              <td>{{ $complaint->title }}</td>
              <td>{{ ucfirst($complaint->category) }}</td>
              <td>{{ $complaint->description }}</td>
              <td>
                @if ($complaint->evidence_file)
                <a href="{{ asset('storage/' . $complaint->evidence_file) }}" target="_blank" class="button small blue">
                  Lihat File
                </a>
                @else
                -
                @endif
              </td>
              <td>
                @if ($complaint->status == 'submitted')
                <span class="badge blue">Dikirim</span>
                @elseif ($complaint->status == 'in_review')
                <span class="badge yellow">Ditinjau</span>
                @elseif ($complaint->status == 'responded')
                <span class="badge green">Ditanggapi</span>
                @else
                <span class="badge red">Ditutup</span>
                @endif
              </td>
              <td>{{ $complaint->admin_feedback ?? '-' }}</td>
              <td>{{ $complaint->created_at->format('d M Y H:i') }}</td>
            </tr>
            @empty
            <tr>
              <td colspan="9" class="has-text-centered">Belum ada pengaduan</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

</x-layout>