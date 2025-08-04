@extends('../layouts/base')

@section('body')

    <body class="py-5">
        <div id="wrap">
            <div class="web-wrapper" id="page">
                <main>
                    <div class="container-fluid auth-page">
                        <div class="row">

                            {{-- Informasi Klinik Umum --}}
                            <div class="col-lg-10 left-wrap">
                                <div class="image" style="background-image: url(images/masthead-home.jpg)"></div>
                                <div class="description">
                                    <h3 class="fw-bold mb-3">Pelayanan Kami</h3>
                                    <div class="row small">
                                        <div class="col-6">
                                            <ul class="list-unstyled mb-0">
                                                <li>Pemeriksaan umum</li>
                                                <li>Pengobatan harian</li>
                                                <li>Suntik & infus</li>
                                                <li>Perawatan luka</li>
                                                <li>Cek gula darah & kolesterol</li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="list-unstyled mb-0">
                                                <li>Nebulizer (terapi uap)</li>
                                                <li>Pemeriksaan kehamilan</li>
                                                <li>Imunisasi anak</li>
                                                <li>Konsultasi kesehatan</li>
                                                <li>Surat keterangan sakit</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="address text-white small">
                                    <p class="mb-0">Jl. Beringin Raya, RT.001/RW.007, Nusa Jaya,</p>
                                    <p class="mb-0">Kec. Karawaci, Kota Tangerang, Banten 15116</p>
                                </div>
                            </div>

                            {{-- Form Login --}}
                            <div class="col-lg-2 right-wrap">
                                <div class="form-wrap">
                                    <div class="box">
                                        <!-- Logo -->
                                        <div class="mb-3">
                                            <img src="{{ asset('images/logo.png') }}" alt="Logo Klinik" class="img-fluid">
                                        </div>

                                        <!-- Judul & Sub Judul -->
                                        <h2 class="h5 mb-1 fw-bold">Klinik Umum Al-Fiat Praktek 24 Jam</h2>
                                        <p class="text-muted mb-4">Silakan masuk untuk melanjutkan</p>

                                        <!-- Form Login -->
                                        <form class="login" action="{{ route('login-pasien') }}" method="post">
                                            @csrf
                                            <div class="form-group empw">
                                                <!-- Input No. Rekam Medis -->
                                                <label for="id_pasien" class="form-label">No. Rekam Medis <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control top rounded" id="id_pasien" type="text"
                                                    name="id_pasien" placeholder="Contoh: RM001234" required
                                                    autocomplete="off" />

                                                <!-- Input Tanggal Lahir -->
                                                <label for="tanggal_lahir" class="form-label mt-3">Tanggal Lahir <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control bot rounded" id="tanggal_lahir" type="date"
                                                    name="tanggal_lahir" required />
                                            </div>

                                            <!-- Error login -->
                                            @if ($errors->has('credential'))
                                                <div class="alert alert-danger py-2 small">
                                                    <i class="fas fa-exclamation-circle me-1"></i> Data yang Anda masukkan
                                                    salah.
                                                </div>
                                            @endif

                                            <!-- Tombol Masuk -->
                                            <div class="d-grid mb-2">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-sign-in-alt me-1"></i> Masuk
                                                </button>
                                            </div>
                                        </form>

                                        <!-- Tombol Register -->
                                        <div class="d-grid">
                                            <a href="{{ route('register-pasien') }}" class="btn btn-outline-secondary">
                                                <i class="fas fa-user-plus me-1"></i> Daftar Akun Baru
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </main>
                <div class="back-to-top"></div>
            </div>
        </div>
    </body>
@endsection
