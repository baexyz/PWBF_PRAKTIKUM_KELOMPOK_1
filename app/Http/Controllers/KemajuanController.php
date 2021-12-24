<?php

namespace App\Http\Controllers;

use App\Models\DetailKemajuan;
use App\Models\Kemajuan;
use App\Models\Santri;
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

    public function destroy($id) {
        $kemajuan = Kemajuan::find($id);
        $santri = $kemajuan->idsantri;
        $delete = $kemajuan->delete();
        if($delete)
            return redirect("/dashboard/santri/$santri")->with('success', 'Data kemajuan berhasil dihapus');
        else
            return redirect("/dashboard/santri/$santri")->with('error', 'Data kemajuan gagal dihapus');
    }

    public function show($id) {
        $namasantri = Santri::find($id)->namasantri;
        $kemajuan = Kemajuan::where('idsantri', $id)->orderBy('created_at', 'desc')->get();
        return view('dashboard.detailkemajuan', [
            'namasantri' => $namasantri,
            'kemajuan' => $kemajuan
        ]);
    }
    
    public function update(Request $request, $id) {
        $data = $request->all();
        $detailkemajuan = DetailKemajuan::where('idkemajuan', $id)
        ->update([
            'idbab' => $data['idbab'],
            'keterangan' => $data['keterangan']
        ]);
        if($detailkemajuan)
            return redirect()->back()->with('success', 'Data kemajuan berhasil di-update');
        else
            return redirect()->back()->with('error', 'Data kemajuan gagal di-update');
    }
}
