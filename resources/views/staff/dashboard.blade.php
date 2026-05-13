<x-layout>
  <x-slot:breadcrumb>
    <li>Dashboard Staff</li>
    </x-slot>

    <style>
      /* ── ROOT ── */
      :root {
        --navy: #07213e;
        --navy-mid: #0d2f57;
        --gold: #e9b856;
        --gold-dark: #c99a3a;
        --white: #ffffff;
        --bg: #f4f6fb;
        --muted: #64748b;
        --border: #e2e8f0;
      }

      .main-section {
        background: var(--bg) !important;
      }

      /* ── CARD ── */
      .staff-card {
        background: var(--white);
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 2px 16px rgba(7, 33, 62, .08);
        margin-bottom: 1.75rem;
      }

      .staff-card-header {
        background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);
        border-bottom: 3px solid var(--gold);
        padding: .9rem 1.25rem;
        display: flex;
        align-items: center;
        gap: .6rem;
      }

      .staff-card-header i {
        color: var(--gold);
        font-size: 1.15rem;
      }

      .staff-card-header span {
        color: var(--white);
        font-weight: 700;
        font-size: .95rem;
        letter-spacing: .02em;
      }

      /* ── TABLE ── */
      .staff-table {
        width: 100%;
        border-collapse: collapse;
        font-size: .845rem;
      }

      .staff-table thead th {
        background: var(--navy);
        color: var(--gold);
        font-size: .72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .07em;
        padding: .75rem 1rem;
        white-space: nowrap;
        border: none;
      }

      .staff-table tbody tr {
        border-bottom: 1px solid var(--border);
        transition: background .12s;
      }

      .staff-table tbody tr:nth-child(even) {
        background: #f8fafd;
      }

      .staff-table tbody tr:hover {
        background: rgba(233, 184, 86, .09) !important;
      }

      .staff-table tbody td {
        padding: .7rem 1rem;
        color: #334155;
        vertical-align: middle;
      }

      /* ── BADGE ── */
      .badge {
        display: inline-flex;
        align-items: center;
        padding: .22rem .7rem;
        border-radius: 999px;
        font-size: .7rem;
        font-weight: 700;
        letter-spacing: .05em;
        text-transform: uppercase;
        white-space: nowrap;
      }

      .badge.blue {
        background: #dbeafe;
        color: #1e40af;
      }

      .badge.yellow {
        background: #fef3c7;
        color: #92400e;
      }

      .badge.green {
        background: #dcfce7;
        color: #166534;
      }

      .badge.red {
        background: #fee2e2;
        color: #991b1b;
      }

      /* ── KODE PENGADUAN ── */
      .complaint-code {
        font-family: monospace;
        font-size: .78rem;
        background: #f0f4fa;
        color: var(--navy);
        font-weight: 700;
        padding: .2rem .55rem;
        border-radius: 5px;
        white-space: nowrap;
      }

      /* ── INLINE ACTION ── */
      .action-inline {
        display: flex;
        align-items: center;
        gap: .5rem;
        flex-wrap: nowrap;
      }

      .action-inline select {
        padding: .35rem .55rem;
        border: 1.5px solid var(--border);
        border-radius: 7px;
        font-size: .78rem;
        color: var(--navy);
        background: var(--white);
        outline: none;
        cursor: pointer;
        transition: border-color .15s, box-shadow .15s;
        min-width: 130px;
      }

      .action-inline select:focus {
        border-color: var(--gold);
        box-shadow: 0 0 0 3px rgba(233, 184, 86, .2);
      }

      .action-inline .btn-act {
        display: inline-flex;
        align-items: center;
        gap: .3rem;
        padding: .37rem .85rem;
        background: var(--navy);
        color: var(--gold);
        border: none;
        border-radius: 7px;
        font-size: .78rem;
        font-weight: 700;
        white-space: nowrap;
        cursor: pointer;
        transition: background .15s, transform .1s;
      }

      .action-inline .btn-act:hover {
        background: var(--navy-mid);
        transform: translateY(-1px);
      }

      /* ── FEEDBACK CELL ── */
      .feedback-cell {
        max-width: 160px;
        white-space: normal;
        font-size: .8rem;
        color: var(--muted);
        line-height: 1.4;
      }
    </style>

    {{-- ================= SUBMISSION ================= --}}
    <div class="staff-card">
      <div class="staff-card-header">
        <i class="mdi mdi-file-document-outline"></i>
        <span>Daftar Pengajuan User</span>
      </div>

      <table class="staff-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Jenis</th>
            <th>Lokasi</th>
            <th>Mulai</th>
            <th>Selesai</th>
            <th>Status</th>
            <th>Divisi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($submissions as $i => $submission)
          <tr>
            <td style="color:var(--muted);font-size:.78rem;">{{ $i + 1 }}</td>
            <td style="max-width:220px;white-space:normal;font-weight:500;">{{ $submission->title }}</td>
            <td>{{ ucfirst($submission->type) }}</td>
            <td>{{ $submission->location }}</td>
            <td style="white-space:nowrap;font-size:.8rem;">{{ \Carbon\Carbon::parse($submission->start_date)->format('d M Y') }}</td>
            <td style="white-space:nowrap;font-size:.8rem;">{{ \Carbon\Carbon::parse($submission->end_date)->format('d M Y') }}</td>
            <td>
              @switch($submission->status)
              @case('submitted') <span class="badge blue">Diajukan</span> @break
              @case('revision') <span class="badge red">Revisi</span> @break
              @case('verified') <span class="badge yellow">Terverifikasi</span> @break
              @case('in_review') <span class="badge blue">Ditinjau</span> @break
              @case('approved') <span class="badge green">Disetujui</span> @break
              @case('rejected') <span class="badge red">Ditolak</span> @break
              @endswitch
            </td>
            <td style="font-size:.82rem;">{{ $submission->division->name ?? '-' }}</td>
            <td>
              <form action="{{ route('staff.submissions.update', $submission->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="action-inline">
                  <select name="status" required>
                    <option value="" disabled selected>Status</option>
                    <option value="revision">Revisi</option>
                    <option value="verified">Terverifikasi</option>
                    <option value="in_review">Ditinjau</option>
                  </select>
                  <select name="assigned_division_id" required>
                    <option value="" disabled selected>Divisi</option>
                    @foreach($divisions as $division)
                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                    @endforeach
                  </select>
                  <button type="submit" class="btn-act">
                    <i class="mdi mdi-send"></i> Disposisi
                  </button>
                </div>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    {{-- ================= COMPLAINT ================= --}}
    <div class="staff-card">
      <div class="staff-card-header">
        <i class="mdi mdi-alert-circle-outline"></i>
        <span>Daftar Pengaduan User</span>
      </div>

      <table class="staff-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Kode</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Penanggung Jawab</th>
            <th>Status</th>
            <th>Feedback Admin</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($complaints as $i => $complaint)
          <tr>
            <td style="color:var(--muted);font-size:.78rem;">{{ $i + 1 }}</td>
            <td><span class="complaint-code">{{ $complaint->complaint_code }}</span></td>
            <td style="max-width:180px;white-space:normal;font-weight:500;">{{ $complaint->title }}</td>
            <td>{{ ucfirst($complaint->category) }}</td>
            <td style="font-size:.82rem;">{{ $complaint->assignedStaff->name ?? '-' }}</td>
            <td>
              @switch($complaint->status)
              @case('submitted') <span class="badge blue">Diajukan</span> @break
              @case('in_review') <span class="badge yellow">Ditinjau</span> @break
              @case('responded') <span class="badge green">Ditanggapi</span> @break
              @case('closed') <span class="badge red">Ditutup</span> @break
              @endswitch
            </td>
            <td class="feedback-cell">{{ $complaint->admin_feedback ?? '-' }}</td>
            <td>
              <form action="{{ route('staff.complaints.update', $complaint->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="action-inline">
                  <select name="status" required>
                    <option value="" disabled selected>Status</option>
                    <option value="in_review">Ditinjau</option>
                    <option value="responded">Ditanggapi</option>
                    <option value="closed">Ditutup</option>
                  </select>
                  <button type="submit" class="btn-act">
                    <i class="mdi mdi-check-circle-outline"></i> Update
                  </button>
                </div>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

</x-layout>