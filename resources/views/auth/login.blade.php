@extends('../layouts/base')
@section('body')

    <body>
        <div id="wrap">
            <div class="web-wrapper" id="page">
                <main>
                    <div class="page-login">
                        <div class="page-login__box">
                            <div class="page-login__logo"><img src="images/logo.png" class="img-fluid" /></div>

                            <form method="POST" action="{{ route('login-store') }}">
                                @csrf
                                {{-- Pesan kesalahan umum --}}
                                @if ($errors->has('username') || $errors->has('password'))
                                    <div class="alert alert-danger rounded">
                                        <strong>Username atau password salah.</strong><br> Silakan coba lagi.
                                    </div>
                                @endif

                                {{-- Username  --}}
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" type="text" name="username"
                                        placeholder="Masukkan username anda" value="{{ old('username') }}" required />
                                </div>

                                {{-- Password  --}}
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="password"
                                        placeholder="Masukkan password anda" required />
                                </div>
                                <div class="form-action">
                                    <button class="btn btn--primary btn--block" type="submit">Masuk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
                <div class="back-to-top"></div>
            </div>
        </div>
    </body>
@endsection
