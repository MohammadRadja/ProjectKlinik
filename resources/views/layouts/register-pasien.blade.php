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
                                    <h3 class="fw-bold mb-3">Pendaftaran Pasien Baru</h3>
                                    <p class="small">Isi data dengan benar untuk membuat akun rekam medis Anda.</p>
                                </div>

                                <div class="address text-white small">
                                    <p class="mb-0">Jl. Beringin Raya, RT.001/RW.007, Nusa Jaya,</p>
                                    <p class="mb-0">Kec. Karawaci, Kota Tangerang, Banten 15116</p>
                                </div>
                            </div>

                            {{-- Form Register --}}
                            <div class="col-lg-2 right-wrap">
                                <div class="form-wrap">
                                    <div class="box">
                                        <!-- Logo -->
                                        <div class="mb-3">
                                            <img src="{{ asset('images/logo.png') }}" alt="Logo Klinik" class="img-fluid">
                                        </div>

                                        <!-- Judul & Sub Judul -->
                                        <h2 class="h5 mb-1 fw-bold">Formulir Registrasi Pasien</h2>
                                        <p class="text-muted mb-4">Silakan lengkapi data berikut untuk mendaftar</p>

                                        <form class="form--add-contact" id="form-data">
                                            @csrf
                                            <div class="add-contact__title">
                                                <h1 class="title--primary">Tambah Pasien Baru</h1>
                                            </div>
                                            <div class="form-group">
                                                <label>Id Pasien</label>
                                                <input value="{{ $kode }}" readonly class="form-control required"
                                                    type="text" name="id_pasien" id="id_pasien" />
                                            </div>
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input class="form-control required" type="text" name="name"
                                                    id="name" />
                                            </div>
                                            <div class="form-group dp">
                                                <label>Tanggal Lahir</label>
                                                <input class="form-control required" type="text" name="tanggal_lahir"
                                                    id="tanggal_lahir" />
                                                <div class="inpt-apend"></div>
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select class="select select-contact-group" id="jenis_kelamin"
                                                    name="jenis_kelamin" title="Pilih Jenis Kelamin"
                                                    onchange="generateKode()">
                                                    @foreach (\App\Models\Pasien::$enumJenisKelamin as $item)
                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Mobile No.</label>

                                                <input class="form-control required number" type="text" name="telp"
                                                    id="telp" />
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input class="form-control required number" maxlength="255" type="text"
                                                    name="alamat" id="alamat" />
                                            </div>
                                            <div class="form-action text-right">
                                                <button class="btn btn--primary btn--next btn--submit" type="button"
                                                    onclick="store()">Simpan</button>
                                            </div>
                                        </form>

                                        <!-- Tombol Kembali ke Login -->
                                        <div class="d-grid">
                                            <a href="{{ route('login') }}" class="btn btn-outline-primary">
                                                <i class="fas fa-arrow-left me-1"></i> Kembali ke Login
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
<script>
    $(document).ready(function() {
        $('#tanggal_lahir').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true
        });
    })

    function generateKode() {
        $.ajax({
            url: '{{ route('generate-kode-pasien') }}',
            data: {
                param: function() {
                    return $('#role_id').val();
                },
            },
            type: 'get',
            success: function(data) {
                $('#user_id').val(data.kode);
            },
            error: function(data) {
                generateKode();
            }
        });
    }

    function store() {
        var validation = 0;
        if ($('#jenis_kelamin').val() == null || $('#jenis_kelamin').val() == '') {
            $('#jenis_kelamin').addClass('is-invalid');
            validation++
        }

        $('#form-data .required').each(function() {
            var par = $(this).parents('.form-group');
            if ($(this).val() == '' || $(this).val() == null) {
                console.log($(this));
                $(this).addClass('is-invalid');
                validation++
            }
        })

        if (validation != 0) {
            Swal.fire({
                title: 'Oops Something Wrong',
                html: 'Semua data harus diisi',
                icon: "warning",
            });
            return false;
        }

        var formData = new FormData();

        var data = $('#form-data').serializeArray();


        data.forEach((d, i) => {
            formData.append(d.name, d.value);
        })

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
                $.ajax({
                    url: '{{ route('register-pasien') }}',
                    data: formData,
                    type: 'post',
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status == 1) {
                            Swal.fire({
                                title: 'Success',
                                text: data.message,
                                icon: "success",
                            }).then(() => {
                                location.href = '/';
                            })
                        } else if (data.status == 2) {
                            Swal.fire({
                                title: 'Oops Something Wrong',
                                html: data.message,
                                icon: "warning",
                            });
                        } else {
                            Swal.fire({
                                title: 'Oops Something Wrong',
                                html: data,
                                icon: "warning",
                            });
                        }
                        overlay(false);
                    },
                    error: function(data) {
                        overlay(false);
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
</script>
