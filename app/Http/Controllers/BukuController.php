<?php

namespace App\Http\Controllers;

use App\Models\Bab;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.daftarbuku', [
            
            'buku' => Buku::all(),

        ]);
    }


    public function detailbuku($id)
    {
        $buku = Buku::find($id);
        return view('dashboard.bab', [
            
            'bab' => $buku->bab()->get(), 

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        //
    }

    public function show($id)
    {
        $buku = Buku::find($id);
        $judul = $buku->buku;
        $bab = $buku->bab()->get();
        return view('dashboard.bab', [
            'judul' => $judul,
            'bab' => $bab
        ]);
    }

    public function list()
    {
        //
        $buku = Buku::select('idbuku','buku')->get();
        $data = $buku->map(function ($item, $key){
            return collect($item)->flatten();
        });
        return response()->json($buku);
    }

    public function update(Request $request, $id)
    {
        //
        $buku = Buku::find($id);
        if ($buku) {
            $buku->update($request->all());
            return redirect('/dashboard/buku')->with('success', 'Buku berhasil di-update');
        } else {
            return redirect('/dashboard/buku')->with('error', 'Buku tidak ditemukan');
        }
    }

    public function delete($id)
    {
        $delete = Buku::destroy($id);
        if($delete)
            return redirect('/dashboard/buku')->with('success', 'Buku berhasil dihapus');
        else
            return redirect('/dashboard/buku')->with('error', 'Buku gagal dihapus');
    }
}
