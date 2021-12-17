<?php

namespace App\Http\Controllers;

use App\Models\Bab;
use Illuminate\Http\Request;

class BabController extends Controller
{
    public function update(Request $request, $id)
    {
        //
        $bab = Bab::find($id);
        $idbuku = $bab->idbuku;
        if ($bab) {
            $bab->update($request->all());
            return redirect("/dashboard/buku/$idbuku")->with('success', 'Bab berhasil di-update');
        } else {
            return redirect("/dashboard/buku/$idbuku")->with('error', 'Bab tidak ditemukan');
        }
    }

    public function delete($id)
    {
        $bab = Bab::find($id);
        $idbuku = $bab->idbuku;
        $delete = $bab->delete();
        if($delete)
            return redirect("/dashboard/buku/$idbuku")->with('success', 'Bab berhasil dihapus');
        else
            return redirect("/dashboard/buku/$idbuku")->with('error', 'Bab gagal dihapus');
    }
}
