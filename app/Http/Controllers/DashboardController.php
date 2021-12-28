<?php

namespace App\Http\Controllers;

use App\Models\DetailPeran;
use App\Models\Kemajuan;
use App\Models\Santri;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }

    public function profile(){
        return view('dashboard.users-profile');
    }

    public function raport(){
        if (Auth::guard('santri')->check()) {
            $id = Auth::guard('santri')->user()->idsantri;
            $namasantri = Auth::guard('santri')->user()->namasantri;
            $kemajuan = Kemajuan::where('idsantri', $id)->orderBy('created_at', 'desc')->get();
            return view('dashboard.detailkemajuan', [
                'namasantri' => $namasantri,
                'idsantri' => $id,
                'kemajuan' => $kemajuan
            ]);
        } else {
            $kemajuan = Kemajuan::orderBy('created_at', 'desc')->get()->groupBy('idsantri');
            // ddd($kemajuan);
            return view('dashboard.kemajuan', [
                'kemajuan' => $kemajuan
            ]);
        }
    }

    public function detailraport(){
        return view('dashboard.detailkemajuan');
    }

    public function buku(){
        return view('dashboard.bab');
    }

    public function pengurus(){
        $pengurus = Pengurus::all();
        $pengurus->load('detailperan.peran');
        return view('dashboard.pengurus', [
            "pengurus" => $pengurus,
        ]);
    }

    

    public function hapus($id){
        Pengurus::find($id)->delete();
    }

    public function uploadPhoto(Request $request) {
        //return storage_path('app');
        
        if (Auth::guard('santri')->check()) {
            $id = Auth::guard('santri')->user()->idsantri;
            $userModel = Santri::find($id);
        }
        else {
            $id = auth()->user()->idpengurus;
            $userModel = Pengurus::find($id);
        }

        // //
        // $request->validate([
        //     'image.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
        // ]);
        if($request->hasFile('image')) {
                
            $file = $request->file('image');
            $fileName = $file->hashName();
            // $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/img/profile_pic' ;
            $file->move($destinationPath,$fileName);
        }
        try {
            $userModel->update([
                'profile_pic' => '/img/profile_pic/' . $fileName
            ]);
            return redirect()->back()->with('success', 'Foto telah tersimpan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th);
            //throw $th;
        }
    }

    // public function remove(){
    //     Pengurus::find(11)->delete();
    // }
}
