<x-layout>
  <x-slot:breadcrumb>
    <li>Dashboard</li>
    </x-slot>

    {{-- SUCCESS TOAST --}}
    @if (session('success'))
    <div class="toast-success" role="alert">
      <i class="mdi mdi-check-circle"></i>
      <span>{{ session('success') }}</span>
    </div>
    @endif

    {{-- SUBMISSION --}}
    <div class="staff-card">
      <div class="staff-card-header">
        <i class="mdi mdi-file-document-outline"></i>
        <span>Daftar Pengajuan User</span>
      </div>

      <div style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
        <table class="staff-table">
          <thead>
            <tr>
              <th>#</th>
              <th>Jenis</th>
              <th>Judul</th>
              <th>Lokasi</th>
              <th>Divisi</th>
              <th>Mulai</th>
              <th>Selesai</th>
              <th>Diteruskan oleh</th>
              <th>Disetujui oleh</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($submissions as $i => $submission)
            <tr>
              <td style="color:var(--text-soft);font-size:.78rem;">{{ $i + 1 }}</td>
              <td>{{ ucfirst($submission->type) }}</td>
              <td style="max-width:220px;white-space:normal;font-weight:500;">{{ $submission->title }}</td>
              <td>{{ $submission->location }}</td>
              <td style="font-size:.82rem;">{{ $submission->division->name ?? '-' }}</td>
              <td style="white-space:nowrap;font-size:.8rem;">{{ \Carbon\Carbon::parse($submission->start_date)->format('d M Y') }}</td>
              <td style="white-space:nowrap;font-size:.8rem;">{{ \Carbon\Carbon::parse($submission->end_date)->format('d M Y') }}</td>
              <td style="font-size:.82rem;">{{ $submission->staff->name ?? '-' }}</td>
              <td style="font-size:.82rem;">{{ $submission->admin->name ?? '-' }}</td>
              <td>
                @switch($submission->status)
                @case('submitted') <span class="badge blue">Diajukan</span> @break
                @case('revision') <span class="badge red">Revisi Dokumen</span> @break
                @case('verified') <span class="badge yellow">Terverifikasi</span> @break
                @case('in_review') <span class="badge blue">Ditinjau</span> @break
                @case('approved') <span class="badge green">Disetujui</span> @break
                @case('rejected') <span class="badge red">Ditolak</span> @break
                @endswitch
              </td>
              <td>
                <div style="display:flex;align-items:center;gap:.35rem;flex-wrap:nowrap;">
                  @if ($submission->document_file)
                  <a href="{{ asset('storage/' . $submission->document_file) }}" target="_blank" class="btn-act">
                    <i class="mdi mdi-file-eye"></i> Lihat
                  </a>
                  @endif

                  <button type="button" class="btn-act" onclick="openModal('sub-{{ $submission->id }}')">
                    <i class="mdi mdi-pencil"></i> Edit
                  </button>
                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="9"
                style="text-align:center;padding:2rem;color:var(--text-soft);">
                Belum ada data pengajuan
              </td>
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
              <th>Diteruskan oleh</th>
              <th>Ditanggapi oleh</th>
              <th>Feedback</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($complaints as $i => $complaint)
            <tr>
              <td style="color:var(--text-soft);font-size:.78rem;">{{ $i + 1 }}</td>
              <td><span class="complaint-code">{{ $complaint->complaint_code }}</span></td>
              <td style="max-width:180px;white-space:normal;font-weight:500;">{{ $complaint->title }}</td>
              <td>{{ ucfirst($complaint->category) }}</td>
              <td style="font-size:.82rem;">{{ $complaint->assignedStaff->name ?? '-' }}</td>
              <td style="font-size:.82rem;">{{ $complaint->admin->name ?? '-' }}</td>
              <td class="feedback-cell">{{ $complaint->admin_feedback ?? '-' }}</td>
              <td>
                @switch($complaint->status)
                @case('submitted') <span class="badge blue">Dikirim</span> @break
                @case('in_review') <span class="badge yellow">Ditinjau</span> @break
                @case('responded') <span class="badge green">Ditanggapi</span> @break
                @case('closed') <span class="badge red">Ditutup</span> @break
                @endswitch
              </td>
              <td>
                <div style="display:flex;align-items:center;gap:.35rem;flex-wrap:nowrap;">
                  @if ($complaint->evidence_file)
                  <a href="{{ asset('storage/' . $complaint->evidence_file) }}" target="_blank" class="btn-act">
                    <i class="mdi mdi-file-eye"></i> Lihat
                  </a>
                  @endif

                  <button type="button" class="btn-act" onclick="openModal('cmp-{{ $complaint->id }}')">
                    <i class="mdi mdi-pencil"></i> Edit
                  </button>
                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="8"
                style="text-align:center;padding:2rem;color:var(--text-soft);">
                Belum ada data pengaduan
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    {{-- MODAL SUBMISSION --}}
    @foreach($submissions as $submission)
    <div id="modal-sub-{{ $submission->id }}" style="display:none;position:fixed;inset:0;z-index:999;background:rgba(0,0,0,0.45);align-items:center;justify-content:center;">
      <div style="background:white;border-radius:16px;padding:1.5rem;width:90%;max-width:440px;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem;">
          <strong style="color:var(--navy);font-size:.95rem;">Update Pengajuan</strong>
          <button onclick="closeModal('sub-{{ $submission->id }}')" style="background:none;border:none;font-size:1.3rem;cursor:pointer;color:#64748b;">&times;</button>
        </div>
        <form action="{{ route('staff.submissions.update', $submission->id) }}" method="POST">
          @csrf
          @method('PATCH')
          <div style="margin-bottom:.8rem;">
            <label style="font-size:.78rem;font-weight:600;color:var(--navy);display:block;margin-bottom:.3rem;">Status</label>
            <select name="status" style="width:100%;padding:.45rem .7rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;">
              <option value="" disabled selected>Pilih Status</option>
              <option value="revision">Revisi</option>
              <option value="verified">Terverifikasi</option>
              <option value="in_review">Ditinjau</option>
            </select>
          </div>
          <div style="margin-bottom:1rem;">
            <label style="font-size:.78rem;font-weight:600;color:var(--navy);display:block;margin-bottom:.3rem;">Divisi</label>
            <select name="assigned_division_id" style="width:100%;padding:.45rem .7rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;">
              <option value="" disabled selected>Pilih Divisi</option>
              @foreach($divisions as $division)
              <option value="{{ $division->id }}">{{ $division->name }}</option>
              @endforeach
            </select>
          </div>
          <div style="display:flex;justify-content:flex-end;gap:.5rem;">
            <button type="button" onclick="closeModal('sub-{{ $submission->id }}')" style="padding:.4rem 1rem;border:1.5px solid #e2e8f0;border-radius:8px;background:white;font-size:.82rem;cursor:pointer;">Batal</button>
            <button type="submit" class="btn-act"><i class="mdi mdi-send"></i> Disposisi</button>
          </div>
        </form>
      </div>
    </div>
    @endforeach

    {{-- MODAL COMPLAINT --}}
    @foreach($complaints as $complaint)
    <div id="modal-cmp-{{ $complaint->id }}" style="display:none;position:fixed;inset:0;z-index:999;background:rgba(0,0,0,0.45);align-items:center;justify-content:center;">
      <div style="background:white;border-radius:16px;padding:1.5rem;width:90%;max-width:440px;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem;">
          <strong style="color:var(--navy);font-size:.95rem;">Update Pengaduan</strong>
          <button onclick="closeModal('cmp-{{ $complaint->id }}')" style="background:none;border:none;font-size:1.3rem;cursor:pointer;color:#64748b;">&times;</button>
        </div>
        <form action="{{ route('staff.complaints.update', $complaint->id) }}" method="POST">
          @csrf
          @method('PATCH')
          <div style="margin-bottom:.8rem;">
            <label style="font-size:.78rem;font-weight:600;color:var(--navy);display:block;margin-bottom:.3rem;">Status</label>
            <select name="status" required style="width:100%;padding:.45rem .7rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;">
              <option value="" disabled selected>Pilih Status</option>
              <option value="in_review">Ditinjau</option>
              <option value="responded">Ditanggapi</option>
              <option value="closed">Ditutup</option>
            </select>
          </div>
          <div style="display:flex;justify-content:flex-end;gap:.5rem;">
            <button type="button" onclick="closeModal('cmp-{{ $complaint->id }}')" style="padding:.4rem 1rem;border:1.5px solid #e2e8f0;border-radius:8px;background:white;font-size:.82rem;cursor:pointer;">Batal</button>
            <button type="submit" class="btn-act"><i class="mdi mdi-check-circle-outline"></i> Update</button>
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