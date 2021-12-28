<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pengurus', [
            
            'pengurus' => Pengurus::all(),

        ]);
    }

    public function create(Request $request)
    {
        $pengurus = Pengurus::create($request->all());
        if ($pengurus) {
            $pengurus->update($request->all());
            return redirect()->back()->with('success', 'Pengurus berhasil di-tambah');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan data');
        }
    }

    public function update(Request $request, $id)
    {
        //
        $pengurus = Pengurus::find($id);
        if ($pengurus) {
            $pengurus->update($request->all());
            return redirect()->back()->with('success', 'Pengurus berhasil di-update');
        } else {
            return redirect()->back()->with('error', 'Pengurus gagal di-update');
        }
    }

    public function delete($id)
    {
        $pengurus = Pengurus::find($id);
        $delete = $pengurus->delete();
        if($delete)
            return redirect()->back()->with('success', 'Pengurus berhasil dihapus');
        else
            return redirect()->back()->with('error', 'Pengurus gagal dihapus');
    }
}
