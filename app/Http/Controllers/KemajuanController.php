<?php

namespace App\Http\Controllers;

use App\Models\DetailKemajuan;
use App\Models\Kemajuan;
use Illuminate\Http\Request;

class KemajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kemajuan', [
            
            'kemajuan' => Kemajuan::all(),

        ]);
    }

    public function store(Request $request) {
        $data = $request->all();
        $pengurus = $request->user()->idpengurus;
        $santri = $data['idsantri'];
        $kemajuan = Kemajuan::create([
            'idpengurus' => $pengurus,
            'idsantri' => $santri,
            'tanggal' => now(),
            'status' => $data['status']
        ]);

        $detail = DetailKemajuan::create([
            'idkemajuan' => $kemajuan->idkemajuan,
            'idbab' => $data['idbab'],
            'keterangan' => $data['keterangan']
        ]);
        if ($detail) {
            return redirect('/dashboard/kemajuan')->with('success', 'Kemajuan berhasil di-tambah');
        } else {
            return redirect('/dashboard/kemajuan')->with('error', 'Gagal menambahkan kemajuan');
        }
    }
}
