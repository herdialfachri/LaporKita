<x-layout>
  <x-slot:breadcrumb>
    <li>Dashboard Pengguna</li>
    </x-slot>

    {{-- SUBMISSION --}}
    <div class="staff-card">
      <div class="staff-card-header">
        <i class="mdi mdi-file-document-outline"></i>
        <span>Data Pengajuan Saya</span>
      </div>

      <div style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
        <table class="staff-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Jenis</th>
              <th>Judul</th>
              <th>Lokasi</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
              <th>Status</th>
              <th>File</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($submissions as $submission)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ ucfirst($submission->type) }}</td>
              <td style="max-width:220px;white-space:normal;font-weight:500;">{{ $submission->title }}</td>
              <td>{{ $submission->location }}</td>
              <td style="white-space:nowrap;font-size:.8rem;">{{ $submission->start_date ? \Carbon\Carbon::parse($submission->start_date)->format('d M Y') : '-' }}</td>
              <td style="white-space:nowrap;font-size:.8rem;">{{ $submission->end_date ? \Carbon\Carbon::parse($submission->end_date)->format('d M Y') : '-' }}</td>
              <td>
                @if ($submission->status == 'submitted') <span class="badge blue">Dikirim</span>
                @elseif ($submission->status == 'revision') <span class="badge red">Revisi</span>
                @elseif ($submission->status == 'verified') <span class="badge yellow">Terverifikasi</span>
                @elseif ($submission->status == 'in_review') <span class="badge blue">Sedang Ditinjau</span>
                @elseif ($submission->status == 'approved') <span class="badge green">Disetujui</span>
                @elseif ($submission->status == 'rejected') <span class="badge red">Ditolak</span>
                @endif
              </td>
              <td>
                @if ($submission->document_file)
                <a href="{{ asset('storage/' . $submission->document_file) }}" target="_blank" class="btn-act">
                  <i class="mdi mdi-file-eye"></i> Lihat
                </a>
                @else -
                @endif
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="8" class="has-text-centered" style="color:var(--text-soft);padding:2rem;">Belum ada pengajuan</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    {{-- COMPLAINT --}}
    <div class="staff-card">
      <div class="staff-card-header">
        <i class="mdi mdi-alert-circle-outline"></i>
        <span>Data Pengaduan Saya</span>
      </div>

      <div style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
        <table class="staff-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Pengaduan</th>
              <th>Kategori</th>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th>Status</th>
              <th>Feedback Admin</th>
              <th>File Bukti</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($complaints as $complaint)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td><span class="complaint-code">{{ $complaint->complaint_code }}</span></td>
              <td>{{ ucfirst($complaint->category) }}</td>
              <td style="max-width:180px;white-space:normal;font-weight:500;">{{ $complaint->title }}</td>
              <td class="feedback-cell">{{ $complaint->description }}</td>
              <td>
                @if ($complaint->status == 'submitted') <span class="badge blue">Dikirim</span>
                @elseif ($complaint->status == 'in_review') <span class="badge yellow">Ditinjau</span>
                @elseif ($complaint->status == 'responded') <span class="badge green">Ditanggapi</span>
                @else <span class="badge red">Ditutup</span>
                @endif
              </td>
              <td class="feedback-cell">{{ $complaint->admin_feedback ?? '-' }}</td>
              <td>
                @if ($complaint->evidence_file)
                <a href="{{ asset('storage/' . $complaint->evidence_file) }}" target="_blank" class="btn-act">
                  <i class="mdi mdi-file-eye"></i> Lihat
                </a>
                @else -
                @endif
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="8" class="has-text-centered" style="color:var(--text-soft);padding:2rem;">Belum ada pengaduan</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

</x-layout>