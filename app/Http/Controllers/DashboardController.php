<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }

    public function profile(){
        return view('dashboard.users-profile');
    }

    public function pengurus(){
        return view('dashboard.pengurus', [
            "pengurus" => Pengurus::with(['detailperan.peran'])->get(),
        ]);
    }

    public function hapus($id){
        Pengurus::find($id)->delete();
    }

    // public function remove(){
    //     Pengurus::find(11)->delete();
    // }
}
