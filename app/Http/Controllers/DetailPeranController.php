<?php

namespace App\Http\Controllers;

use App\Models\DetailPeran;
use Illuminate\Http\Request;

class DetailPeranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengurus2', [
            
            'detailperan' => DetailPeran::all(),

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
     * Display the specified resource.
     *
     * @param  \App\Models\detailperan  $detailperan
     * @return \Illuminate\Http\Response
     */
    public function show(detailperan $detailperan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detailperan  $detailperan
     * @return \Illuminate\Http\Response
     */
    public function edit(detailperan $detailperan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detailperan  $detailperan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detailperan $detailperan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detailperan  $detailperan
     * @return \Illuminate\Http\Response
     */
    public function destroy(detailperan $detailperan)
    {
        //
    }
}
