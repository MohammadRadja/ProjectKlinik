<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginPasienController extends Controller
{
    public function create()
    {
        if (Auth::guard('pasien')->check()) {
            return redirect()->intended(RouteServiceProvider::HOME_PASIEN);
        }

        return view('layouts/home-pasien');
    }

    public function generatekode(Request $req)
    {
        $kode = 'RM';
        $sub = strlen($kode) + 1;
        $index = Pasien::selectRaw('max(substring(id_pasien,' . $sub . ')) as id')
            ->where('id_pasien', 'like', $kode . '%')
            ->first();

        $collect = Pasien::selectRaw('substring(id_pasien,' . $sub . ') as id')->get();

        $count = (int) $index->id;
        $collect_id = [];
        for ($i = 0; $i < count($collect); $i++) {
            array_push($collect_id, (int) $collect[$i]->id);
        }

        $flag = 0;
        for ($i = 0; $i < $count; $i++) {
            if ($flag == 0) {
                if (!in_array($i + 1, $collect_id)) {
                    $index = $i + 1;
                    $flag = 1;
                }
            }
        }

        if ($flag == 0) {
            $index = (int) $index->id + 1;
        }

        $index = str_pad($index, 4, '0', STR_PAD_LEFT);

        $kode = $kode . $index;

        return Response()->json(['status' => 1, 'kode' => $kode]);
    }

    public function showRegisterForm(Request $req)
    {
        $kode = $this->generatekode($req)->getData()->kode;

        return view('layouts/register-pasien', compact('kode'));
    }

    public function register(Request $req)
    {
        return DB::transaction(function () use ($req) {
            $input = $req->all();

            $input['id'] = Pasien::max('id') + 1;
            $input['created_by'] = DB::raw('NULL');
            $input['updated_by'] = DB::raw('NULL');
            $input['status'] = true;
            $input['tanggal_lahir'] = dateStore($req->tanggal_lahir);

            Pasien::create($input);
            return Response()->json(['status' => 1, 'message' => 'Data berhasil disimpan']);
        });
    }

    public function store(Request $req)
    {
        $check = Pasien::where('id_pasien', $req->id_pasien)->where('tanggal_lahir', $req->tanggal_lahir)->where('status', true)->first();
        if ($check) {
            Auth::guard('pasien')->attempt(['id_pasien' => $req->id_pasien, 'password' => $req->tanggal_lahir]);
            return redirect()->route('dashboard-pasien');
        } else {
            return back()->withErrors([
                'credential' => 'Tidak ada data pasien terdaftar',
            ]);
        }
    }

    public function destroy(Request $req)
    {
        Auth::guard('pasien')->logout();

        $req->session()->invalidate();

        $req->session()->regenerateToken();

        return redirect('/');
    }
}
