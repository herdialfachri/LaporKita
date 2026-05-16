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
              <th>Catatan</th>
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
                @elseif ($submission->status == 'revision') <span class="badge red">Revisi Dokumen</span>
                @elseif ($submission->status == 'verified') <span class="badge yellow">Terverifikasi</span>
                @elseif ($submission->status == 'in_review') <span class="badge blue">Sedang Ditinjau</span>
                @elseif ($submission->status == 'approved') <span class="badge green">Disetujui</span>
                @elseif ($submission->status == 'rejected') <span class="badge red">Ditolak</span>
                @endif
              </td>
              <td class="feedback-cell">{{ $submission->admin_notes ?? '-' }}</td>
              <td>
                <div style="display:flex;align-items:center;gap:.35rem;flex-wrap:nowrap;">

                  @if ($submission->document_file)
                  <a href="{{ asset('storage/' . $submission->document_file) }}?v={{ time() }}"
                    target="_blank"
                    class="btn-act">
                    <i class="mdi mdi-file-eye"></i> Lihat
                  </a>
                  @endif

                  @if (in_array($submission->status, ['submitted', 'revision']))
                  <button type="button"
                    class="btn-act"
                    onclick="openModal('edit-sub-{{ $submission->id }}')">
                    <i class="mdi mdi-pencil"></i> Edit
                  </button>
                  @else
                  <button type="button"
                    class="btn-act"
                    disabled
                    style="opacity:.45;cursor:not-allowed;">
                    <i class="mdi mdi-lock"></i> Edit
                  </button>
                  @endif

                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="9" class="has-text-centered" style="text-align:center;padding:2rem;color:var(--text-soft);">
                Belum ada pengajuan</td>
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
              <th>Feedback</th>
              <th>File</th>
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
                @elseif ($complaint->status == 'in_review') <span class="badge yellow">Dilihat</span>
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
              <td colspan="8" class="has-text-centered" style="text-align:center;padding:2rem;color:var(--text-soft);">
                Belum ada pengaduan
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    @foreach($submissions as $submission)

    @if (in_array($submission->status, ['submitted', 'revision']))

    <div id="modal-edit-sub-{{ $submission->id }}"
      style="display:none;position:fixed;inset:0;z-index:999;background:rgba(0,0,0,0.45);align-items:center;justify-content:center;">

      <div style="background:white;border-radius:16px;padding:1.5rem;width:90%;max-width:440px;box-shadow:0 20px 60px rgba(0,0,0,0.2);">

        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem;">
          <strong style="color:var(--navy);font-size:.95rem;">
            Edit Pengajuan
          </strong>

          <button
            onclick="closeModal('edit-sub-{{ $submission->id }}')"
            style="background:none;border:none;font-size:1.3rem;cursor:pointer;color:#64748b;">
            &times;
          </button>
        </div>

        <form action="{{ route('dashboard.submissions.update', $submission->id) }}"
          method="POST"
          enctype="multipart/form-data">

          @csrf
          @method('PATCH')

          <div style="margin-bottom:1rem;">

            <label style="font-size:.78rem;font-weight:600;color:var(--navy);display:block;margin-bottom:.3rem;">
              Upload Dokumen Revisi (PDF)
            </label>

            <input type="file"
              name="document_file"
              accept=".pdf"
              required
              style="width:100%;padding:.45rem .7rem;border:1.5px solid #e2e8f0;border-radius:8px;font-size:.85rem;">

            <small style="font-size:.72rem;color:#64748b;">
              Upload file PDF revisi terbaru
            </small>

          </div>

          <div style="display:flex;justify-content:flex-end;gap:.5rem;">

            <button type="button"
              onclick="closeModal('edit-sub-{{ $submission->id }}')"
              style="padding:.4rem 1rem;border:1.5px solid #e2e8f0;border-radius:8px;background:white;font-size:.82rem;cursor:pointer;">
              Batal
            </button>

            <button type="submit" class="btn-act">
              <i class="mdi mdi-content-save-outline"></i>
              Upload Revisi
            </button>

          </div>

        </form>
      </div>
    </div>

    @endif
    @endforeach

    <script>
      function openModal(id) {
        const modal = document.getElementById('modal-' + id);

        if (modal) {
          modal.style.display = 'flex';
        }
      }

      function closeModal(id) {
        const modal = document.getElementById('modal-' + id);

        if (modal) {

          // reset form ke value awal
          const form = modal.querySelector('form');

          if (form) {
            form.reset();
          }

          modal.style.display = 'none';
        }
      }

      // klik backdrop
      document.addEventListener('click', function(e) {

        if (e.target.id && e.target.id.startsWith('modal-')) {

          const form = e.target.querySelector('form');

          if (form) {
            form.reset();
          }

          e.target.style.display = 'none';
        }
      });
    </script>

</x-layout>