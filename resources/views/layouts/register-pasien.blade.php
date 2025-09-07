@extends('../layouts/home')
@section('body')

<section class="d-flex align-items-center justify-content-center min-vh-100 bg-light" style="padding-top: 100px;">
    <div class="container"> 
        <div class="row g-0 shadow rounded overflow-hidden">
            
            {{-- Informasi Klinik --}}
            <div class="col-lg-6 d-none d-lg-block bg-dark text-white p-5" 
                 style="background: url('{{ asset('images/masthead-home.jpg') }}') center/cover no-repeat;">
                <div class="bg-dark bg-opacity-75 p-4 rounded">
                    <h3 class="fw-bold">Pendaftaran Pasien Baru</h3>
                    <p class="small mb-4">Isi data dengan benar untuk membuat akun rekam medis Anda.</p>
                    <div class="mt-auto small">
                        <p class="mb-0">Jl. Beringin Raya, RT.001/RW.007, Nusa Jaya,</p>
                        <p class="mb-0">Kec. Karawaci, Kota Tangerang, Banten 15116</p>
                    </div>
                </div>
            </div>

            {{-- Form Registrasi --}}
            <div class="col-lg-6 bg-white p-4">
                <div class="text-center mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Klinik" height="60" class="mb-2">
                    <h5 class="fw-bold text-primary">Formulir Registrasi Pasien</h5>
                    <p class="text-muted small">Silakan lengkapi data berikut untuk mendaftar</p>
                </div>

                <form id="form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">ID Pasien</label>
                        <input type="text" name="id_pasien" id="id_pasien" value="{{ $kode }}" 
                               class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="form-control required" placeholder="Masukkan nama lengkap">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Lahir</label>
                        <input type="text" name="tanggal_lahir" id="tanggal_lahir" 
                               class="form-control required" placeholder="dd/mm/yyyy">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select required">
                            <option value="">-- Pilih --</option>
                            @foreach (\App\Models\Pasien::$enumJenisKelamin as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nomor HP</label>
                        <input type="text" name="telp" id="telp" class="form-control required" placeholder="08xxxxxxxxxx">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="2" class="form-control required" placeholder="Masukkan alamat lengkap"></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="button" onclick="store()" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan Data
                        </button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-arrow-left me-1"></i> Kembali ke Login
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
