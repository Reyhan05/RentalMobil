<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;


class DataMobilController extends Controller
{
    public function index()
    {
        $mobil = Mobil::all();
        return view('datamobil', compact('mobil'));
    }

    public function create()
    {
        
    }


    public function store(Request $request)
    {
        $mobil = new Mobil;
        $mobil->nama_mobil = $request->nama_mobil;
        $mobil->plat_nomor = $request->plat_nomor;
        $mobil->harga_sewa = $request->harga_sewa;
        $mobil->keterangan = $request->keterangan;
        $mobil->save();
    }

    public function show()
    {
        
    }
}
