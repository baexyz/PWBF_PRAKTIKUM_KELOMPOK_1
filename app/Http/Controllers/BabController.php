<?php

namespace App\Http\Controllers;

use App\Models\Bab;
use Illuminate\Http\Request;

class BabController extends Controller
{

    public function create(Request $request)
    {
        //
        $bab = Bab::create($request->all());
        if ($bab) {
            // $bab->update($request->all());
            return redirect()->back()->with('success', 'Bab berhasil di-tambah');
        } else {
            return redirect()->back()->with('error', 'Bab tidak ditemukan');
        }
    }


    public function update(Request $request, $id)
    {
        //
        $bab = Bab::find($id);
        if ($bab) {
            $bab->update($request->all());
            return redirect()->back()->with('success', 'Bab berhasil di-update');
        } else {
            return redirect()->back()->with('error', 'Bab tidak ditemukan');
        }
    }

    public function delete($id)
    {
        $bab = Bab::find($id);
        $delete = $bab->delete();
        if($delete)
            return redirect()->back()->with('success', 'Bab berhasil dihapus');
        else
            return redirect()->back()->with('error', 'Bab gagal dihapus');
    }
}
