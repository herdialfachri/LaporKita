<x-layout>
  <x-slot:breadcrumb>
    <li>Dashboard</li>
    </x-slot>

    {{-- SUBMISSION --}}
    <div class="staff-card">
      <div class="staff-card-header">
        <i class="mdi mdi-file-document-outline"></i>
        <span>Daftar Pengajuan User (Divisi {{ Auth::user()->division->name }})</span>
      </div>

      <div style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
        <table class="staff-table">
          <thead>
            <tr>
              <th>#</th>
              <th>Judul</th>
              <th>Jenis</th>
              <th>Lokasi</th>
              <th>Mulai</th>
              <th>Selesai</th>
              <th>File</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($submissions as $i => $submission)
            <tr>
              <td style="color:var(--text-soft);font-size:.78rem;">{{ $i + 1 }}</td>
              <td style="max-width:220px;white-space:normal;font-weight:500;">{{ $submission->title }}</td>
              <td>{{ ucfirst($submission->type) }}</td>
              <td>{{ $submission->location }}</td>
              <td style="white-space:nowrap;font-size:.8rem;">{{ $submission->start_date ?? '-' }}</td>
              <td style="white-space:nowrap;font-size:.8rem;">{{ $submission->end_date ?? '-' }}</td>
              <td>
                @if ($submission->document_file)
                <a href="{{ asset('storage/' . $submission->document_file) }}" target="_blank" class="btn-act">
                  <i class="mdi mdi-file-eye"></i> Lihat
                </a>
                @else -
                @endif
              </td>
              <td>
                @switch($submission->status)
                @case('verified') <span class="badge yellow">Terverifikasi</span> @break
                @case('approved') <span class="badge green">Disetujui</span> @break
                @case('rejected') <span class="badge red">Ditolak</span> @break
                @case('submitted') <span class="badge blue">Diajukan</span> @break
                @endswitch
              </td>
              <td>
                <button type="button" class="btn-act" onclick="openModal('submission-{{ $submission->id }}')">
                  <i class="mdi mdi-pencil"></i> Edit
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    {{-- COMPLAINT --}}
    <div class="staff-card">
      <div class="staff-card-header">
        <i class="mdi mdi-alert-circle-outline"></i>
        <span>Daftar Pengaduan User</span>
      </div>

      <div style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
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
              <td style="color:var(--text-soft);font-size:.78rem;">{{ $i + 1 }}</td>
              <td><span class="complaint-code">{{ $complaint->complaint_code }}</span></td>
              <td style="max-width:180px;white-space:normal;font-weight:500;">{{ $complaint->title }}</td>
              <td>{{ ucfirst($complaint->category) }}</td>
              <td style="font-size:.82rem;">{{ $complaint->assignedStaff->name ?? '-' }}</td>
              <td>
                @switch($complaint->status)
                @case('submitted') <span class="badge blue">Diajukan</span> @break
                @case('in_review') <span class="badge yellow">Sedang Ditinjau</span> @break
                @case('responded') <span class="badge green">Ditanggapi</span> @break
                @case('closed') <span class="badge red">Ditutup</span> @break
                @endswitch
              </td>
              <td class="feedback-cell">{{ $complaint->admin_feedback ?? '-' }}</td>
              <td>
                <button type="button" class="btn-act" onclick="openModal('complaint-{{ $complaint->id }}')">
                  <i class="mdi mdi-pencil"></i> Edit
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    {{-- MODAL SUBMISSION --}}
    @foreach($submissions as $submission)
    <div id="modal-submission-{{ $submission->id }}" style="display:none;position:fixed;inset:0;z-index:999;background:rgba(0,0,0,0.45);align-items:center;justify-content:center;">
      <div style="background:white;border-radius:16px;padding:1.5rem;width:90%;max-width:440px;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem;">
          <strong style="color:var(--navy);font-size:.95rem;">Update Pengajuan</strong>
          <button onclick="closeModal('submission-{{ $submission->id }}')" style="background:none;border:none;font-size:1.2rem;cursor:pointer;color:#64748b;">&times;</button>
        </div>
        <form action="{{ route('admin.submissions.update', $submission->id) }}" method="POST">
          @csrf
          @method('PATCH')
          <div style="margin-bottom:.8rem;">
            <label style="font-size:.78rem;font-weight:600;color:var(--navy);display:block;margin-bottom:.3rem;">Status</label>
            <select name="status" required style="width:100%;padding:.45rem .7rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;">
              <option value="" disabled selected>Pilih Status</option>
              <option value="approved">Disetujui</option>
              <option value="rejected">Ditolak</option>
            </select>
          </div>
          <div style="margin-bottom:1rem;">
            <label style="font-size:.78rem;font-weight:600;color:var(--navy);display:block;margin-bottom:.3rem;">Catatan Admin</label>
            <textarea name="admin_notes" rows="3" placeholder="Catatan admin..." style="width:100%;padding:.45rem .7rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;resize:vertical;">{{ $submission->admin_notes }}</textarea>
          </div>
          <div style="display:flex;justify-content:flex-end;gap:.5rem;">
            <button type="button" onclick="closeModal('submission-{{ $submission->id }}')" style="padding:.4rem 1rem;border:1.5px solid #e2e8f0;border-radius:8px;background:white;font-size:.82rem;cursor:pointer;">Batal</button>
            <button type="submit" class="btn-act"><i class="mdi mdi-check"></i> Simpan</button>
          </div>
        </form>
      </div>
    </div>
    @endforeach

    {{-- MODAL COMPLAINT --}}
    @foreach($complaints as $complaint)
    <div id="modal-complaint-{{ $complaint->id }}" style="display:none;position:fixed;inset:0;z-index:999;background:rgba(0,0,0,0.45);align-items:center;justify-content:center;">
      <div style="background:white;border-radius:16px;padding:1.5rem;width:90%;max-width:440px;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem;">
          <strong style="color:var(--navy);font-size:.95rem;">Update Pengaduan</strong>
          <button onclick="closeModal('complaint-{{ $complaint->id }}')" style="background:none;border:none;font-size:1.2rem;cursor:pointer;color:#64748b;">&times;</button>
        </div>
        <form action="{{ route('admin.complaints.update', $complaint->id) }}" method="POST">
          @csrf
          @method('PATCH')
          <div style="margin-bottom:.8rem;">
            <label style="font-size:.78rem;font-weight:600;color:var(--navy);display:block;margin-bottom:.3rem;">Status</label>
            <select name="status" required style="width:100%;padding:.45rem .7rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;">
              <option value="" disabled selected>Pilih Status</option>
              <option value="responded">Ditanggapi</option>
              <option value="closed">Ditutup</option>
            </select>
          </div>
          <div style="margin-bottom:1rem;">
            <label style="font-size:.78rem;font-weight:600;color:var(--navy);display:block;margin-bottom:.3rem;">Feedback Admin</label>
            <textarea name="admin_feedback" rows="3" placeholder="Feedback admin..." required style="width:100%;padding:.45rem .7rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;resize:vertical;">{{ $complaint->admin_feedback }}</textarea>
          </div>
          <div style="display:flex;justify-content:flex-end;gap:.5rem;">
            <button type="button" onclick="closeModal('complaint-{{ $complaint->id }}')" style="padding:.4rem 1rem;border:1.5px solid #e2e8f0;border-radius:8px;background:white;font-size:.82rem;cursor:pointer;">Batal</button>
            <button type="submit" class="btn-act"><i class="mdi mdi-send"></i> Kirim</button>
          </div>
        </form>
      </div>
    </div>
    @endforeach

    <script>
      function openModal(id) {
        const el = document.getElementById('modal-' + id);
        el.style.display = 'flex';
      }

      function closeModal(id) {
        const el = document.getElementById('modal-' + id);
        el.style.display = 'none';
      }
    </script>

</x-layout>