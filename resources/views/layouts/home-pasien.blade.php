@extends('../layouts/home')

@section('body')

<div class="container " style="background-image: url('{{ asset('images/masthead-home.jpg') }}');
                            background-size: cover;
                            background-position: center;
                            min-height: 50vh; padding-top:100px;">
    <div class="row g-0" id="beranda">
        {{-- Informasi Klinik Umum --}}
        <div class="col-12 col-lg-8 order-2 order-lg-1 ">
            <div class="position-relative h-100">
                {{-- Content over image --}}
                <div class="position-relative h-100 d-flex flex-column justify-content-between text-white">
                    <div class="description bg-dark text-center bg-opacity-75 mt-5 p-4 rounded shadow-lg">
                        <h3 class="fw-bold text-uppercase text-success mb-3">
                            Selamat Datang di Klinik Al-Fiyat Tangerang
                        </h3>
                        <h1 class="display-5 fw-bold text-white text-shadow">
                            Perawatan Terpercaya, <span class="text-primary">Kapanpun Dibutuhkan</span>
                        </h1>
                    </div>
                    <div class="address p-4 p-lg-5">
                        <div class="bg-dark bg-opacity-75 p-3 rounded">
                            <p class="mb-1 text-shadow"><i class="fas fa-map-marker-alt me-2"></i>Jl. Beringin Raya, RT.001/RW.007, Nusa Jaya,</p>
                            <p class="mb-0 text-shadow">Kec. Karawaci, Kota Tangerang, Banten 15116</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form Login --}}
        <div class="col-12 col-lg-4 right-wrap d-flex align-items-center order-1 order-lg-2">
            <div class="form-wrap w-100 p-4 p-lg-5">
                <div class="box">
                    <!-- Logo -->
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Klinik" class="img-fluid" style="max-height: 80px;">
                    </div>

                    <!-- Judul & Sub Judul -->
                    <div class="text-center mb-4">
                        <h2 class="h4 mb-2 fw-bold text-primary">Klinik Umum Al-Fiat</h2>
                        <p class="h6 mb-1 text-success">Praktek 24 Jam</p>
                        <p class="text-muted mb-0">Silakan masuk untuk melanjutkan</p>
                    </div>

                    <!-- Form Login -->
                    <form class="login" action="{{ route('login-pasien') }}" method="post">
                        @csrf

                        <!-- Input No. Rekam Medis -->
                        <div class="form-group mb-3">
                            <label for="id_pasien" class="form-label fw-semibold">
                                <i class="fas fa-id-card me-1"></i>No. Rekam Medis <span class="text-danger">*</span>
                            </label>
                            <input class="form-control form-control-lg"
                                id="id_pasien"
                                type="text"
                                name="id_pasien"
                                placeholder="Contoh: RM001234"
                                required
                                autocomplete="off" />
                        </div>

                        <!-- Input Tanggal Lahir -->
                        <div class="form-group mb-3">
                            <label for="tanggal_lahir" class="form-label fw-semibold">
                                <i class="fas fa-calendar me-1"></i>Tanggal Lahir <span class="text-danger">*</span>
                            </label>
                            <input class="form-control form-control-lg"
                                id="tanggal_lahir"
                                type="date"
                                name="tanggal_lahir"
                                required />
                        </div>

                        <!-- Error login -->
                        @if ($errors->has('credential'))
                        <div class="alert alert-danger py-2 mb-3">
                            <i class="fas fa-exclamation-circle me-2"></i>Data yang Anda masukkan salah.
                        </div>
                        @endif

                        <!-- Tombol Masuk -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-sign-in-alt me-2"></i>Masuk
                            </button>
                        </div>
                    </form>

                    <!-- Divider -->
                    <div class="text-center mb-3">
                        <span class="text-muted small">atau</span>
                    </div>

                    <!-- Tombol Register -->
                    <div class="d-grid">
                        <a href="{{ route('register-pasien') }}" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-user-plus me-2"></i>Daftar Akun Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- layanan -->
<section class="services py-5 bg-light" id="layanan">
    <div class="container text-center">
        <h6 class="text-uppercase text-muted mb-2">Layanan Kami</h6>
        <h2 class="fw-bold mb-5">Berikut ini adalah Layanan Medis di Klinik Alfiyat</h2>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="card h-100 shadow-sm border-0 rounded-3">
                    <div class="card-body">
                        <h5 class="card-title">Poli Umum</h5>
                        <p class="card-text text-muted">Pelayanan pemeriksaan kesehatan umum, konsultasi, dan pengobatan ringan.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 shadow-sm border-0 rounded-3">
                    <div class="card-body">
                        <h5 class="card-title">Poli Anak</h5>
                        <p class="card-text text-muted">Kesehatan anak mulai dari imunisasi hingga konsultasi tumbuh kembang.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 shadow-sm border-0 rounded-3">
                    <div class="card-body">
                        <h5 class="card-title">Poli Ibu & Kandungan</h5>
                        <p class="card-text text-muted">Layanan kesehatan ibu hamil, kandungan, dan konsultasi kehamilan.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 shadow-sm border-0 rounded-3">
                    <div class="card-body">
                        <h5 class="card-title">Poli Gigi</h5>
                        <p class="card-text text-muted">Perawatan gigi dan mulut mulai dari konsultasi hingga tindakan medis.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 shadow-sm border-0 rounded-3">
                    <div class="card-body">
                        <h5 class="card-title">Poli Saraf</h5>
                        <p class="card-text text-muted">Konsultasi dan penanganan masalah terkait sistem saraf.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 shadow-sm border-0 rounded-3">
                    <div class="card-body">
                        <h5 class="card-title">Laboratorium</h5>
                        <p class="card-text text-muted">Pemeriksaan laboratorium untuk mendukung diagnosa medis.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 shadow-sm border-0 rounded-3">
                    <div class="card-body">
                        <h5 class="card-title">Farmasi</h5>
                        <p class="card-text text-muted">Penyediaan obat-obatan sesuai resep dokter dengan pelayanan ramah.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 shadow-sm border-0 rounded-3">
                    <div class="card-body">
                        <h5 class="card-title">IGD 24 Jam</h5>
                        <p class="card-text text-muted">Pelayanan gawat darurat yang siap membantu pasien setiap saat.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- tentang kami -->
<section id="tentang" class="py-5">
    <div class="container py-4">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="position-relative">
                    <img src="{{asset('images/about.jpg')}}"
                        alt="Tentang Klinik Alfiyat"
                        class="img-fluid rounded-4 shadow-lg">
                    <div class="position-absolute top-0 end-0 translate-middle">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center shadow"
                            style="width: 80px; height: 80px;">
                            <i class="fa-solid fa-heart-pulse text-white fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 order-1 order-lg-2">
                <div class="ps-lg-4">
                    <div class="d-inline-block px-3 py-1 bg-primary bg-opacity-10 text-primary rounded-pill small fw-semibold mb-3">
                        <i class="bi bi-hospital me-1"></i>
                        Tentang Kami
                    </div>

                    <h2 class="display-6 fw-bold text-dark mb-4 lh-sm">
                        Klinik Alfiyat<br>
                        <span class="text-primary">Tangerang</span>
                    </h2>

                    <p class="fs-6 text-muted lh-lg mb-4">
                        Klinik Alfiyat hadir untuk memberikan pelayanan kesehatan yang ramah, cepat,
                        dan terpercaya bagi masyarakat. Kami menyediakan layanan medis mulai dari
                        pemeriksaan umum, poli spesialis, hingga laboratorium dengan fasilitas modern
                        dan tenaga medis profesional.
                    </p>

                    <div class="row g-3 mb-4">
                        <div class="col-12">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0 me-3">
                                    <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 40px; height: 40px;">
                                        <i class="fa-solid fa-check-double text-success fs-5 fw-bold"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1 fw-semibold">Dokter Berpengalaman</h6>
                                    <small class="text-muted">Tim medis profesional dengan pengalaman bertahun-tahun</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0 me-3">
                                    <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 40px; height: 40px;">
                                        <i class="fa-solid fa-check-double text-success fs-5 fw-bold"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1 fw-semibold">Fasilitas Lengkap & Nyaman</h6>
                                    <small class="text-muted">Peralatan medis modern dalam lingkungan yang nyaman</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0 me-3">
                                    <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 40px; height: 40px;">
                                        <i class="fa-solid fa-check-double text-success fs-5 fw-bold"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1 fw-semibold">Pelayanan Ramah & Cepat</h6>
                                    <small class="text-muted">Layanan terbaik dengan waktu tunggu minimal</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- kontak -->
<section id="kontak" class="py-5">
    <div class="container py-4">
        <!-- Header -->
        <div class="text-center mb-5">
            <div class="d-inline-block px-3 py-1 bg-primary bg-opacity-10 text-primary rounded-pill small fw-semibold mb-3">
                <i class="fas fa-phone me-1"></i>
                Kontak Kami
            </div>
            <h2 class="display-6 fw-bold text-dark mb-3">
                Hubungi <span class="text-primary">Klinik Alfiyat</span>
            </h2>
            <p class="fs-6 text-muted lh-lg col-lg-8 mx-auto">
                Kami siap membantu Anda kapan saja. Silakan hubungi kami melalui informasi berikut
                atau lihat FAQ untuk pertanyaan umum.
            </p>
        </div>

        <!-- Contact Info Cards -->
        <div class="row g-4 mb-5">
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-phone text-primary fs-3"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Telepon</h5>
                        <p class="text-muted mb-3">Hubungi kami langsung</p>
                        <a href="tel:+628123456780" class="text-primary text-decoration-none fw-semibold">
                            +62 812-3456-7890
                        </a>
                        <div class="mt-3">
                            <small class="text-success">
                                <i class="fas fa-clock me-1"></i>
                                24 Jam
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-envelope text-primary fs-3"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Email</h5>
                        <p class="text-muted mb-3">Kirim pesan elektronik</p>
                        <a href="mailto:info@klinikalfiyat.com" class="text-primary text-decoration-none fw-semibold">
                            info@klinikalfiyat.com
                        </a>
                        <div class="mt-3">
                            <small class="text-info">
                                <i class="fas fa-reply me-1"></i>
                                Respon 24 jam
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-map-marker-alt text-primary fs-3"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Lokasi</h5>
                        <p class="text-muted mb-3">Kunjungi klinik kami</p>
                        <address class="text-primary fw-semibold mb-0">
                            Jl. Beringin Raya, RT.001/RW.007, Nusa Jaya,<br>
                            Kec. Karawaci, Kota Tangerang, Banten 15116
                        </address>
                        <div class="mt-3">
                            <small class="text-warning">
                                <i class="fas fa-car me-1"></i>
                                Parkir gratis
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 p-4 pb-2">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 50px; height: 50px;">
                                <i class="fas fa-question-circle text-warning fs-5"></i>
                            </div>
                            <div>
                                <h4 class="fw-bold mb-1">FAQ</h4>
                                <p class="text-muted mb-0">Pertanyaan yang Sering Diajukan</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4 pt-2">
                        <div class="accordion accordion-flush" id="faqAccordion">

                            <!-- FAQ 1 -->
                            <div class="accordion-item border-0 mb-2">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed bg-light rounded-3 border-0 shadow-sm"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                        aria-expanded="false" aria-controls="collapseOne">
                                        <i class="fas fa-clock text-primary me-3"></i>
                                        Apakah Klinik Alfiyat buka 24 jam?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body bg-light bg-opacity-50 rounded-3 mt-2 ms-5">
                                        <p class="mb-0 text-muted">
                                            Ya, Klinik Alfiyat melayani pasien selama <strong>24 jam setiap hari</strong>.
                                            Kami memiliki dokter jaga dan tenaga medis yang siap membantu Anda kapan saja.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ 2 -->
                            <div class="accordion-item border-0 mb-2">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed bg-light rounded-3 border-0 shadow-sm"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fas fa-stethoscope text-primary me-3"></i>
                                        Apa saja layanan yang tersedia di Klinik Alfiyat?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body bg-light bg-opacity-50 rounded-3 mt-2 ms-5">
                                        <p class="mb-2 text-muted">Kami menyediakan berbagai layanan kesehatan:</p>
                                        <ul class="text-muted mb-0 ps-3">
                                            <li>Pemeriksaan umum</li>
                                            <li>Imunisasi anak</li>
                                            <li>Konsultasi kesehatan</li>
                                            <li>Pemeriksaan kehamilan</li>
                                            <li>Perawatan luka</li>
                                            <li>Dan layanan kesehatan lainnya</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ 3 -->
                            <div class="accordion-item border-0 mb-2">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed bg-light rounded-3 border-0 shadow-sm"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        <i class="fas fa-credit-card text-primary me-3"></i>
                                        Apakah menerima pembayaran dengan BPJS?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body bg-light bg-opacity-50 rounded-3 mt-2 ms-5">
                                        <p class="mb-0 text-muted">
                                            Saat ini Klinik Alfiyat menerima <strong>pasien umum dan asuransi tertentu</strong>.
                                            Untuk informasi pembayaran BPJS, silakan hubungi pihak klinik terlebih dahulu
                                            untuk konfirmasi ketersediaan layanan.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ 4 -->
                            <div class="accordion-item border-0">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed bg-light rounded-3 border-0 shadow-sm"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour">
                                        <i class="fas fa-calendar-check text-primary me-3"></i>
                                        Bagaimana cara membuat janji dengan dokter?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body bg-light bg-opacity-50 rounded-3 mt-2 ms-5">
                                        <p class="mb-2 text-muted">Anda bisa membuat janji melalui:</p>
                                        <div class="row g-2">
                                            <div class="col-md-4">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-phone text-success me-2"></i>
                                                    <small class="text-muted">Telepon</small>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="d-flex align-items-center">
                                                    <i class="fab fa-whatsapp text-success me-2"></i>
                                                    <small class="text-muted">WhatsApp</small>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-building text-success me-2"></i>
                                                    <small class="text-muted">Datang langsung</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Custom CSS untuk enhancement --}}
<style>
    /* FORM WRAP */
    .form-wrap {
        background: #fff;
        border-radius: 1rem;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .form-wrap:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    /* BACKGROUND OVERLAY */
    .left-wrap {
        position: relative;
    }

    .left-wrap::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.35);
        /* layer gelap tipis */
        z-index: 1;
    }

    .left-wrap .description,
    .left-wrap .address {
        position: relative;
        z-index: 2;
        /* biar di atas overlay */
    }

    /* FORM INPUT */
    .form-control {
        border-radius: 0.75rem;
    }

    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.3);
    }

    /* BUTTONS */
    .btn {
        border-radius: 0.75rem;
        transition: all 0.2s ease;
    }

    .btn-primary {
        background: linear-gradient(135deg, #0d6efd, #0046b3);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #0046b3, #002a80);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-outline-primary:hover {
        background: #0d6efd;
        color: #fff;
        transform: translateY(-2px);
    }

    /* TEXT IMPROVEMENT */
    .description h3 {
        font-size: 1.75rem;
        margin-bottom: 1.5rem;
    }

    .description li {
        font-size: 1rem;
        line-height: 1.6;
    }

    .address {
        font-size: 0.95rem;
    }

    /* RESPONSIVE FIX */
    @media (max-width: 991.98px) {
        .form-wrap {
            margin: 2rem auto;
            max-width: 500px;
        }
    }

    .auth-page {
        min-height: 100vh;
    }

    .text-shadow {
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
    }

    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }

    .btn-primary {
        background: linear-gradient(135deg, #007bff, #0056b3);
        border: none;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #0056b3, #004085);
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .btn-outline-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 991.98px) {
        .left-wrap .image {
            min-height: 40vh !important;
        }

        .form-wrap {
            padding: 2rem 1.5rem !important;
        }
    }

    @media (max-width: 575.98px) {
        .left-wrap .image {
            min-height: 30vh !important;
        }

        .form-wrap {
            padding: 1.5rem 1rem !important;
        }

        .description {
            padding: 1.5rem !important;
        }

        .address {
            padding: 1.5rem !important;
        }
    }
</style>

@endsection