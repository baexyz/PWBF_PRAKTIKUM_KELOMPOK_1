<?php

namespace App\Http\Controllers;

use App\Models\santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.santri', [
            
            'santri' => Santri::all(),

        ]);
    }

    public function create(Request $request)
    {
        $santri = Santri::create($request->all());
        if ($santri) {
            $santri->update($request->all());
            return redirect("/dashboard/santri")->with('success', 'Santri berhasil di-tambah');
        } else {
            return redirect("/dashboard/santri")->with('error', 'Gagal menambahkan data');
        }
    }

    public function update(Request $request, $id)
    {
        //
        $santri = Santri::find($id);
        if ($santri) {
            $santri->update($request->all());
            return redirect("/dashboard/santri")->with('success', 'Santri berhasil di-update');
        } else {
            return redirect("/dashboard/santri")->with('error', 'Santri gagal di-update');
        }
    }

    public function delete($id)
    {
        $santri = Santri::find($id);
        $delete = $santri->delete();
        if($delete)
            return redirect("/dashboard/santri")->with('success', 'Santri berhasil dihapus');
        else
            return redirect("/dashboard/santri")->with('error', 'Santri gagal dihapus');
    }
}
