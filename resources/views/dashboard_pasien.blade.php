@extends('../layouts/home')
@section('body')
<div class="auth-page pasien-daftar logged mt-5" style="background-image: url('{{ asset('images/masthead-home.jpg') }}');
                            background-size: cover;
                            background-position: center;
                            min-height: 50vh;">
    <div class="row g-0">
        <div class="col-12 col-lg-4">
            <div class="image img-fluid" ></div>
        </div>
        <div class="col-12 col-lg-8">
            <div class="form-wrap p-4">
                <!-- Hidden Logout Form -->
                <form action="{{ route('logout-pasien') }}" method="POST" id="logout" class="d-none">
                    {{ csrf_field() }}
                </form>

                <!-- Header Card -->
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                            <div class="d-flex align-items-center mb-3 mb-md-0">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                                    <i class="fas fa-user-circle fs-4 text-primary"></i>
                                </div>
                                <div>
                                    <h4 class="mb-1 fw-bold text-dark">Selamat Datang!</h4>
                                    <p class="mb-0 text-muted">
                                        <i class="fas fa-user me-1"></i>
                                        <em>{{ Auth::guard('pasien')->user()->name }}</em>
                                    </p>
                                </div>
                            </div>
                            <button class="btn btn-outline-danger rounded-pill px-4" onclick="$('#logout').submit()">
                                <i class="fas fa-sign-out-alt me-2"></i>Keluar
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Navigation Tabs -->
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-0">
                        <ul class="nav nav-pills nav-justified p-3 mb-0" style="background: linear-gradient(135deg, #f8f9fa, #e9ecef); border-radius: 1rem 1rem 0 0;">
                            <li class="nav-item mx-1">
                                <a class="nav-link active rounded-pill fw-semibold px-3 py-2" href="#reservasi" data-toggle="tab">
                                    <i class="fas fa-calendar-plus me-2"></i>Reservasi
                                </a>
                            </li>
                            <li class="nav-item mx-1">
                                <a class="nav-link rounded-pill fw-semibold px-3 py-2" href="#reservasid" data-toggle="tab">
                                    <i class="fas fa-user-md me-2"></i>Panggil Dokter
                                </a>
                            </li>
                            <li class="nav-item mx-1">
                                <a class="nav-link rounded-pill fw-semibold px-3 py-2" href="#antrian" data-toggle="tab">
                                    <i class="fas fa-list-ol me-2"></i>Antrian
                                </a>
                            </li>
                            <li class="nav-item mx-1">
                                <a class="nav-link rounded-pill fw-semibold px-3 py-2" href="#rekam_medis" data-toggle="tab">
                                    <i class="fas fa-file-medical me-2"></i>Rekam Medis
                                </a>
                            </li>
                            <li class="nav-item mx-1">
                                <a class="nav-link rounded-pill fw-semibold px-3 py-2" href="#pembayaran" data-toggle="tab">
                                    <i class="fas fa-credit-card me-2"></i>Pembayaran
                                </a>
                            </li>
                        </ul>

                        <!-- Success Message -->
                        @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissible fade show mx-3 mt-3 rounded-3" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ Session::get('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif

                        <!-- Tab Content -->
                        <div class="tab-content p-4">
                            <!-- Reservasi Tab -->
                            <div class="tab-pane fade active show" id="reservasi">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <div class="text-center mb-4">
                                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                                <i class="fas fa-calendar-plus fs-1 text-primary"></i>
                                            </div>
                                            <h3 class="fw-bold text-dark mb-2">Reservasi Kunjungan</h3>
                                            <p class="text-muted mx-auto" style="max-width: 500px;">
                                                <i class="fas fa-info-circle me-2"></i>
                                                Reservasi yang dilakukan untuk minggu berikutnya, sehingga reservasi dapat dilakukan 1 minggu sebelum hari berobat.
                                            </p>
                                        </div>

                                        <form class="form--add-contact" method="POST" target="_blank" action="{{ route('store-reservasi') }}" id="form-reservasi">
                                            @csrf
                                            <div class="card border-0 bg-light rounded-4">
                                                <div class="card-body p-4">
                                                    @if ($errors->has('already'))
                                                    <div class="alert alert-danger rounded-3 mb-4">
                                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                                        {{ $errors->messages()['already'][0] }}
                                                    </div>
                                                    @endif

                                                    <div class="row g-3">
                                                        <div class="col-12">
                                                            <label class="form-label fw-semibold">
                                                                <i class="fas fa-user-md text-primary me-2"></i>Pilih Dokter
                                                            </label>
                                                            <select class="form-select form-select-lg rounded-3" id="dokter_id_reservasi" name="dokter_id" required onchange="getJadwalDokter('On Site')">
                                                                <option value="">-- Pilih Dokter --</option>
                                                                @forelse ($dokter as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @empty
                                                                <option disabled>Jadwal Dokter tidak tersedia</option>
                                                                @endforelse
                                                            </select>
                                                        </div>

                                                        <div class="col-12 collapse" id="jadwal_dokter_id_reservasi_div">
                                                            <label class="form-label fw-semibold">
                                                                <i class="fas fa-calendar text-success me-2"></i>Pilih Hari
                                                            </label>
                                                            <select class="form-select form-select-lg rounded-3" id="jadwal_dokter_id_reservasi" onchange="changeJadwalDokter(this)" name="jadwal_dokter_id[]" multiple required>
                                                            </select>
                                                            <input type="hidden" value="On Site" name="param">
                                                            <input type="hidden" value="" id="hari_reservasi" name="hari">
                                                        </div>

                                                        <div class="col-12 mt-4">
                                                            <button type="button" class="btn btn-primary btn-lg w-100 rounded-pill" onclick="store('On Site')">
                                                                <i class="fas fa-plus-circle me-2"></i>Daftar Reservasi
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Panggil Dokter Tab -->
                            <div class="tab-pane fade" id="reservasid">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <div class="text-center mb-4">
                                            <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                                <i class="fas fa-user-md fs-1 text-success"></i>
                                            </div>
                                            <h3 class="fw-bold text-dark mb-2">Panggil Dokter</h3>
                                            <p class="text-muted mx-auto" style="max-width: 550px;">
                                                <i class="fas fa-home me-2"></i>
                                                Panggilan Dokter untuk minggu berikutnya dari minggu pendaftaran dan hanya dapat dilakukan oleh pasien yang terdaftar dan harus berdomisili di Tangerang.
                                            </p>
                                        </div>

                                        <form class="form--add-contact" method="POST" target="_blank" action="{{ route('store-reservasi') }}" id="form-panggilan">
                                            @csrf
                                            <div class="card border-0 bg-light rounded-4">
                                                <div class="card-body p-4">
                                                    <div class="row g-3">
                                                        <div class="col-12">
                                                            <label class="form-label fw-semibold">
                                                                <i class="fas fa-user-md text-success me-2"></i>Pilih Dokter
                                                            </label>
                                                            <select class="form-select form-select-lg rounded-3" id="dokter_id_panggilan" name="dokter_id" required onchange="getJadwalDokter('Panggilan')">
                                                                <option value="">-- Pilih Dokter --</option>
                                                                @foreach ($dokter as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-12 collapse" id="jadwal_dokter_id_panggilan_div">
                                                            <label class="form-label fw-semibold">
                                                                <i class="fas fa-calendar text-success me-2"></i>Pilih Hari
                                                            </label>
                                                            <select class="form-select form-select-lg rounded-3" id="jadwal_dokter_id_panggilan" onchange="changeJadwalDokter(this)" name="jadwal_dokter_id[]" multiple required>
                                                            </select>
                                                            <input type="hidden" value="Panggilan" name="param">
                                                            <input type="hidden" value="" id="hari_panggilan" name="hari">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="form-label fw-semibold">
                                                                <i class="fas fa-phone text-info me-2"></i>No. Telephone
                                                            </label>
                                                            <input class="form-control form-control-lg rounded-3" type="text" name="telp" value="{{ Auth::guard('pasien')->user()->telp }}" placeholder="Masukkan nomor telephone" />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="form-label fw-semibold">
                                                                <i class="fas fa-map-marker-alt text-warning me-2"></i>Alamat
                                                            </label>
                                                            <textarea class="form-control form-control-lg rounded-3" name="alamat" rows="3" placeholder="Masukkan alamat lengkap">{{ Auth::guard('pasien')->user()->alamat }}</textarea>
                                                        </div>

                                                        <div class="col-12 mt-4">
                                                            <button type="button" class="btn btn-success btn-lg w-100 rounded-pill" onclick="store('Panggilan')">
                                                                <i class="fas fa-ambulance me-2"></i>Daftar Panggilan Dokter
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Antrian Tab -->
                            <div class="tab-pane fade" id="antrian">
                                <div class="text-center mb-4">
                                    <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                        <i class="fas fa-list-ol fs-1 text-info"></i>
                                    </div>
                                    <h3 class="fw-bold text-dark mb-2">Daftar Antrian</h3>
                                    <p class="text-muted">Pantau status antrian kunjungan Anda</p>
                                </div>

                                <div class="card border-0 rounded-4 overflow-hidden">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th class="px-4 py-3 fw-semibold">
                                                        <i class="fas fa-hashtag me-2"></i>No.
                                                    </th>
                                                    <th class="px-3 py-3 fw-semibold">
                                                        <i class="fas fa-calendar me-2"></i>Tgl. Antrian
                                                    </th>
                                                    <th class="px-3 py-3 fw-semibold">
                                                        <i class="fas fa-user-md me-2"></i>Nama Dokter
                                                    </th>
                                                    <th class="px-3 py-3 fw-semibold">
                                                        <i class="fas fa-clock me-2"></i>Antrian Saat Ini
                                                    </th>
                                                    <th class="px-3 py-3 fw-semibold">
                                                        <i class="fas fa-ticket-alt me-2"></i>No. Antrian
                                                    </th>
                                                    <th class="px-3 py-3 fw-semibold text-center">
                                                        <i class="fas fa-cogs me-2"></i>Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($antrian->sortBy('tanggal') as $i => $item)
                                                <tr>
                                                    <td class="px-4 py-3">
                                                        <span class="badge bg-secondary rounded-pill">{{ $i + 1 }}</span>
                                                    </td>
                                                    <td class="px-3 py-3">
                                                        <div class="d-flex align-items-center">
                                                            <i class="fas fa-calendar-alt text-primary me-2"></i>
                                                            {{ CarbonParse($item->tanggal, 'd/m/Y') }}
                                                        </div>
                                                    </td>
                                                    <td class="px-3 py-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="bg-success bg-opacity-10 rounded-circle p-2 me-2">
                                                                <i class="fas fa-user-md text-success"></i>
                                                            </div>
                                                            {{ $item->jadwal_dokter->dokter->name ?? '-' }}
                                                        </div>
                                                    </td>
                                                    <td class="px-3 py-3">
                                                        <span class="badge bg-info rounded-pill fs-6">{{ $item->no_reservasi }}</span>
                                                    </td>
                                                    <td class="px-3 py-3">
                                                        <span class="badge bg-primary rounded-pill fs-6">{{ $item->no_reservasi }}</span>
                                                    </td>
                                                    <td class="px-3 py-3 text-center">
                                                        @if (diffdate($item->tanggal, dateStore()) > 1)
                                                        <button class="btn btn-outline-danger btn-sm rounded-pill" onclick="hapus('{{ $item->jadwal_dokter_id }}','{{ $item->id }}',this)" title="Batalkan reservasi">
                                                            <i class="fas fa-trash me-1"></i>Batal
                                                        </button>
                                                        @else
                                                        <span class="text-muted small">
                                                            <i class="fas fa-lock me-1"></i>Tidak dapat dibatalkan
                                                        </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="6" class="text-center py-5">
                                                        <div class="text-muted">
                                                            <i class="fas fa-inbox fs-1 mb-3 d-block"></i>
                                                            <h5>Tidak ada data antrian</h5>
                                                            <p>Anda belum memiliki antrian aktif saat ini</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Rekam Medis Tab -->
                            <div class="tab-pane fade" id="rekam_medis">
                                <div class="text-center mb-4">
                                    <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                        <i class="fas fa-file-medical fs-1 text-warning"></i>
                                    </div>
                                    <h3 class="fw-bold text-dark mb-2">Rekam Medis</h3>
                                    <p class="text-muted">Riwayat kunjungan dan tindakan medis Anda</p>
                                </div>

                                <div class="card border-0 rounded-4 overflow-hidden">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead class="table-warning">
                                                <tr>
                                                    <th class="px-4 py-3 fw-semibold">
                                                        <i class="fas fa-hashtag me-2"></i>No.
                                                    </th>
                                                    <th class="px-3 py-3 fw-semibold">
                                                        <i class="fas fa-id-card me-2"></i>No. Rekam Medis
                                                    </th>
                                                    <th class="px-3 py-3 fw-semibold">
                                                        <i class="fas fa-calendar me-2"></i>Tgl. Berobat
                                                    </th>
                                                    <th class="px-3 py-3 fw-semibold">
                                                        <i class="fas fa-stethoscope me-2"></i>Tindakan
                                                    </th>
                                                    <th class="px-3 py-3 fw-semibold">
                                                        <i class="fas fa-notes-medical me-2"></i>Keterangan
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($rm as $i => $item)
                                                <tr>
                                                    <td class="px-4 py-3">
                                                        <span class="badge bg-secondary rounded-pill">{{ $i + 1 }}</span>
                                                    </td>
                                                    <td class="px-3 py-3">
                                                        <code class="bg-light px-2 py-1 rounded">{{ $item->id_rekam_medis }}</code>
                                                    </td>
                                                    <td class="px-3 py-3">
                                                        <div class="d-flex align-items-center">
                                                            <i class="fas fa-calendar-alt text-primary me-2"></i>
                                                            {{ CarbonParse($item->tanggal, 'd/m/Y') }}
                                                        </div>
                                                    </td>
                                                    <td class="px-3 py-3">
                                                        <span class="badge bg-info bg-opacity-20 text-dark rounded-pill">
                                                            {{ $item->tindakan }}
                                                        </span>
                                                    </td>
                                                    <td class="px-3 py-3">
                                                        <div class="text-truncate" style="max-width: 200px;" title="{{ $item->keterangan }}">
                                                            {{ $item->keterangan }}
                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="5" class="text-center py-5">
                                                        <div class="text-muted">
                                                            <i class="fas fa-file-medical fs-1 mb-3 d-block"></i>
                                                            <h5>Tidak ada rekam medis</h5>
                                                            <p>Belum ada riwayat kunjungan medis</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Pembayaran Tab -->
                            <div class="tab-pane fade" id="pembayaran">
                                <div class="text-center mb-4">
                                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                        <i class="fas fa-credit-card fs-1 text-success"></i>
                                    </div>
                                    <h3 class="fw-bold text-dark mb-2">Pembayaran</h3>
                                    <p class="text-muted">Riwayat tagihan dan pembayaran Anda</p>
                                </div>

                                <div class="card border-0 rounded-4 overflow-hidden">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead class="table-success">
                                                <tr>
                                                    <th class="px-4 py-3 fw-semibold">
                                                        <i class="fas fa-hashtag me-2"></i>No.
                                                    </th>
                                                    <th class="px-3 py-3 fw-semibold">
                                                        <i class="fas fa-receipt me-2"></i>No. Invoice
                                                    </th>
                                                    <th class="px-3 py-3 fw-semibold">
                                                        <i class="fas fa-calendar me-2"></i>Tanggal
                                                    </th>
                                                    <th class="px-3 py-3 fw-semibold">
                                                        <i class="fas fa-money-bill me-2"></i>Total Tagihan
                                                    </th>
                                                    <th class="px-3 py-3 fw-semibold text-center">
                                                        <i class="fas fa-cogs me-2"></i>Status / Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($invoice as $i => $item)
                                                <tr>
                                                    <td class="px-4 py-3">
                                                        <span class="badge bg-secondary rounded-pill">{{ $i + 1 }}</span>
                                                    </td>
                                                    <td class="px-3 py-3">
                                                        <code class="bg-light px-2 py-1 rounded">{{ $item->nomor_invoice }}</code>
                                                    </td>
                                                    <td class="px-3 py-3">
                                                        <div class="d-flex align-items-center">
                                                            <i class="fas fa-calendar-alt text-primary me-2"></i>
                                                            {{ CarbonParse($item->tanggal, 'd/m/Y') }}
                                                        </div>
                                                    </td>
                                                    <td class="px-3 py-3">
                                                        <div class="fw-bold text-success fs-6">
                                                            Rp {{ number_format($item->total, 0, ',', '.') }}
                                                        </div>
                                                    </td>
                                                    <td class="px-3 py-3 text-center">
                                                        @if ($item->status == 'Released' and $item->metode_pembayaran == 'Transfer Bank')
                                                        <button class="btn btn-primary btn-sm rounded-pill" onclick="modalVerifikasi('{{ $item->id }}')" data-toggle="modal" data-target="#modalVerif">
                                                            <i class="fas fa-credit-card me-1"></i>Bayar
                                                        </button>
                                                        @elseif($item->status == 'Rejected')
                                                        <button class="btn btn-danger btn-sm rounded-pill" onclick="modalVerifikasi('{{ $item->id }}')" data-toggle="modal" data-target="#modalVerif">
                                                            <i class="fas fa-redo me-1"></i>Bayar Ulang
                                                        </button>
                                                        @elseif($item->status == 'Waiting')
                                                        <span class="badge bg-warning text-dark rounded-pill">
                                                            <i class="fas fa-clock me-1"></i>Menunggu Verifikasi
                                                        </span>
                                                        @elseif($item->status == 'Done')
                                                        <span class="badge bg-success rounded-pill">
                                                            <i class="fas fa-check-circle me-1"></i>Terbayar
                                                        </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="5" class="text-center py-5">
                                                        <div class="text-muted">
                                                            <i class="fas fa-receipt fs-1 mb-3 d-block"></i>
                                                            <h5>Tidak ada tagihan</h5>
                                                            <p>Belum ada riwayat pembayaran</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Modal Verifikasi Pembayaran  --}}
                <div class="modal" id="modalVerif" tabindex="-1">
                    <div class="modal-dialog modal-dialog--centered modal-dialog--sm">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h2>Upload Bukti Pembayaran</h2>
                                <form id="form-data" method="POST" enctype="multipart/form-data"
                                    action="{{ route('verifikasi-pembayaran') }}">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-group metode_pembayaran_div">
                                            <label>Nama Rekening</label>
                                            <input class="form-control form-control-sm required metode_pembayaran" type="text"
                                                name="no_transaksi" id="no_transaksi" />
                                            <input type="hidden" id="pembayaran_id" name="pembayaran_id" class="required">
                                            <input type="hidden" id="param" name="param" value="input_pembayaran">
                                        </div>
                                        <div class="form-group metode_pembayaran_div">
                                            <label>No. Rekening</label>
                                            <input class="form-control form-control-sm required metode_pembayaran" type="text"
                                                name="no_rekening" id="no_rekening" />
                                        </div>
                                        <div class="form-group metode_pembayaran_div">
                                            <label>Bukti Transfer</label>
                                            <input type="file" class="dropify" id="upload_bukti_transfer"
                                                name="upload_bukti_transfer" data-allowed-file-extensions="jpeg jpg png">
                                        </div>
                                    </div>
                                    <div class="form-action text-right">
                                        <button class="btn btn--white" type="button" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn--acc" type="button" onclick="verifikasiPembayaran()">Upload
                                            Bukti</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection

                @section('script')
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
                    integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
                    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script>
                    (function() {
                        $('.dropify').dropify();
                    }())

                    function changeJadwalDokter(par) {
                        $('#hari_reservasi').val($(par).find('option:selected').data('hari'));
                    }

                    function capitalizeFirstLetter(string) {
                        return string.charAt(0).toUpperCase() + string.slice(1);
                    }

                    function getJadwalDokter(param) {
                        $.ajax({
                            url: '{{ route('get-jadwal-dokter') }}',
                            data: {
                                id: function() {
                                    switch (param) {
                                        case 'On Site':
                                            return $('#dokter_id_reservasi').val();
                                            break;
                                        case 'Panggilan':
                                            return $('#dokter_id_panggilan').val();
                                            break;
                                        default:
                                            break;
                                    }
                                },
                                param: param
                            },
                            type: 'get',
                            success: function(data) {

                                switch (param) {
                                    case 'On Site':
                                        $('#jadwal_dokter_id_reservasi_div').removeClass('collapse');
                                        $('#jadwal_dokter_id_reservasi').empty();
                                        data.data.forEach((d, i) => {
                                            var option = '<option data-hari="' + d.hari + '" value="' + d.id +
                                                '">' + d.tanggal +
                                                ' | ' +
                                                capitalizeFirstLetter(d.hari) +
                                                ' (' + d.sisa_kuota + ')' +
                                                '</option>';

                                            $('#jadwal_dokter_id_reservasi').append(option);

                                        });

                                        $('#jadwal_dokter_id_reservasi').selectpicker('refresh');
                                        $('#jadwal_dokter_id_reservasi').selectpicker('val', null);
                                        if (data.data.length === 0) {
                                            $('#jadwal_dokter_id_reservasi').empty();
                                            $('#jadwal_dokter_id_reservasi').append('<option value="">Tidak ada jadwal tersedia</option>');
                                            $('#jadwal_dokter_id_reservasi').selectpicker('refresh');
                                            return;
                                        }
                                        break;
                                    case 'Panggilan':
                                        $('#jadwal_dokter_id_panggilan_div').removeClass('collapse');
                                        $('#jadwal_dokter_id_panggilan').empty();
                                        if (data.data.length > 0) {
                                            data.data.forEach((d, i) => {
                                                var option = '<option data-hari="' + d.hari + '" value="' + d.id + '">' +
                                                    d.tanggal + ' | ' +
                                                    capitalizeFirstLetter(d.hari) +
                                                    ' (' + d.sisa_kuota + ')' +
                                                    '</option>';

                                                $('#jadwal_dokter_id_panggilan').append(option);
                                            });
                                        } else {
                                            // kalau tidak ada jadwal sama sekali
                                            $('#jadwal_dokter_id_panggilan').append('<option value="">Tidak ada jadwal tersedia</option>');
                                        }

                                        $('#jadwal_dokter_id_panggilan').selectpicker('refresh');
                                        $('#jadwal_dokter_id_panggilan').selectpicker('val', null);
                                        break;
                                    default:
                                        break;
                                }

                            },
                            error: function(data) {
                                getJadwalDokter(param);
                            }
                        });
                    }

                    function store(param) {
                        switch (param) {
                            case 'On Site':
                                var validation = 0;
                                if ($('#dokter_id_reservasi').val() == null || $('#dokter_id_reservasi').val() == '') {
                                    $('#dokter_id_reservasi').addClass('is-invalid');
                                    validation++
                                }

                                if ($('#jadwal_dokter_id_reservasi').val() == null || $('#jadwal_dokter_id_reservasi').val() == '' || $(
                                        '#jadwal_dokter_id_reservasi').val() ==
                                    undefined) {
                                    $('#jadwal_dokter_id_reservasi').addClass('is-invalid');
                                    validation++
                                }

                                if (validation != 0) {
                                    Swal.fire({
                                        title: 'Oops Something Wrong',
                                        html: 'Semua data harus diisi',
                                        icon: "warning",
                                    });
                                    return false;
                                }

                                overlay(true);
                                $('#form-reservasi').submit()
                                break;
                            case 'Panggilan':
                                var validation = 0;
                                if ($('#dokter_id_panggilan').val() == null || $('#dokter_id_panggilan').val() == '') {
                                    $('#dokter_id_panggilan').addClass('is-invalid');
                                    validation++
                                }

                                if ($('#jadwal_dokter_id_panggilan').val() == null || $('#jadwal_dokter_id_panggilan').val() == '' || $(
                                        '#jadwal_dokter_id_panggilan').val() ==
                                    undefined) {
                                    $('#jadwal_dokter_id_panggilan').addClass('is-invalid');
                                    validation++
                                }

                                if (validation != 0) {
                                    Swal.fire({
                                        title: 'Oops Something Wrong',
                                        html: 'Semua data harus diisi',
                                        icon: "warning",
                                    });
                                    return false;
                                }

                                overlay(true);
                                $('#form-panggilan').submit()
                                break;
                            default:
                                break;
                        }
                        var delayInMilliseconds = 1000; //1 second

                        setTimeout(function() {
                            location.reload();
                        }, delayInMilliseconds);
                    }

                    function reindex() {
                        $(".index-antrian").each(function(i) {
                            $(this).html(i + 1);
                        })
                    }

                    function hapus(jadwal_dokter_id, id, par) {
                        var previousWindowKeyDown = window.onkeydown;
                        Swal.fire({
                            title: "Hapus Data",
                            text: "Aksi ini tidak bisa dikembalikan",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya lanjutkan!',
                            cancelButtonText: 'Tidak!',
                            showLoaderOnConfirm: true,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.onkeydown = previousWindowKeyDown;
                                $.ajax({
                                    url: '{{ route('delete-reservasi') }}',
                                    data: {
                                        jadwal_dokter_id: jadwal_dokter_id,
                                        id: id,
                                        _token: "{{ csrf_token() }}"
                                    },
                                    type: 'post',
                                    success: function(data) {
                                        if (data.status == 1) {
                                            Swal.fire({
                                                title: data.message,
                                                icon: 'success',
                                            });

                                            $(par).parents('tr').remove();
                                            reindex();
                                        } else if (data.status == 2) {
                                            Swal.fire({
                                                title: data.message,
                                                icon: "warning",
                                            });
                                        }
                                    },
                                    error: function(data) {
                                        var html = '';
                                        Object.keys(data.responseJSON).forEach(element => {
                                            html += data.responseJSON[element][0] + '<br>';
                                        });
                                        Swal.fire({
                                            title: 'Oops Something Wrong!',
                                            html: data.responseJSON.message == undefined ? html : data
                                                .responseJSON.message,
                                            icon: "error",
                                        });
                                    }
                                });
                            }
                        })
                    }

                    function modalVerifikasi(id) {
                        $('#pembayaran_id').val(id);
                    }

                    function verifikasiPembayaran() {
                        var validation = 0;
                        $('#form-data .required').each(function() {
                            var par = $(this).parents('.form-group');
                            if ($(this).val() == '' || $(this).val() == null) {
                                console.log($(this));
                                $(this).addClass('is-invalid');
                                validation++
                            }
                        })

                        $('.dropify').each(function(i) {
                            var parDrop = $(this).parents('.form-group');
                            if ($(this)[0].files[0] == undefined) {
                                validation++;
                                $(parDrop).find('.dropify-wrapper').addClass('is-invalid');
                            } else {
                                $(parDrop).find('.dropify-wrapper').removeClass('is-invalid');
                            }
                        });

                        if (validation != 0) {
                            Swal.fire({
                                title: 'Oops Something Wrong',
                                html: 'Semua data harus diisi',
                                icon: "warning",
                            });
                            return false;
                        }

                        var previousWindowKeyDown = window.onkeydown;
                        Swal.fire({
                            title: 'Proses Aksi Ini?',
                            text: "Proses ini tidak bisa dikembalikan!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya lanjutkan!',
                            cancelButtonText: 'Tidak!',
                            showLoaderOnConfirm: true,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.onkeydown = previousWindowKeyDown;
                                overlay(true);
                                $('#form-data').submit();
                            }
                        })
                    }
                </script>
                @endsection