<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\merk;


class DataMobilController extends Controller
{
    public function index()
    {
        $mobil = Mobil::with('merk')->get();
        $merks = merk::all();
        return view('datamobil', compact('mobil', 'merks'));
    }

    public function create()
    {
        
    }


    public function store(Request $request)
    {
        $mobil = new Mobil;
        $mobil->id_merk = $request->id_merk;
        $mobil->nama_mobil = $request->nama_mobil;
        $mobil->plat_nomor = $request->plat_nomor;
        $mobil->harga_sewa = $request->harga_sewa;
        $mobil->keterangan = $request->keterangan;
        $mobil->save();

        return redirect('/datamobil');
    }

    public function show()
    {
        
    }

    public function update(Request $request, $id)
    {
        // uptade data mobil menggunakan metode eloquent
        $mobil = Mobil::find($id);
        $mobil->id_merk = $request->id_merk;
        $mobil->nama_mobil = $request->nama_mobil;
        $mobil->plat_nomor = $request->plat_nomor;
        $mobil->harga_sewa= $request->harga_sewa;
        $mobil->keterangan = $request->keterangan;
        $mobil->save();

        if ($mobil){
            return redirect('/datamobil')->with(['success' => 'Data Berhasil Diupdate']);
        } else {
            return redirect('/datamobil')->with(['error' => 'Data Gagal Diupdate']);
        }
    }

    public function destroy($id)
    {
        Mobil::find($id)->delete();

        return redirect('/datamobil');
    }
}

