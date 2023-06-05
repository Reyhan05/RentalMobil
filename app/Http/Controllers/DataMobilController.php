<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\merk;
use File;


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

        $path = 'uploads/';
        if (File::isDirectory($path)){
            // masukan kondisi ketika file berada dalam directory uploads
            // mendefinisikan variable untuk menampung request atau permintaan file foto
            $file = $request->file('photo');

            // mendefinisikan nama format nama file foto
            $filename = $file->getClientOriginalName();

            // memindahkan file foto ke dalam folder uploads beserta format nama
            $file->move($path, $filename);

            // menyimpan nama file foto ke dalam database
            $mobil->photo = $filename;
        }
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
        $path = 'uploads/'.$mobil->photo;

        // Jikalau menambahkan foto
        if ($request->hasFile('photo-edit')){
            if (File::exists($path)){
                File::delete($path);
            }
                // mendefinisikan variable untuk menampung request atau permintaan file foto
                $file = $request->file('photo-edit');
    
                // mendefinisikan nama format nama file foto
                $filename = $file->getClientOriginalName();
    
                // memindahkan file foto ke dalam folder uploads beserta format nama
                $file->move('uploads/', $filename);
    
                // menyimpan nama file foto ke dalam database
                $mobil->photo = $filename;      
        }
        $mobil->save();

        if ($mobil){
            return redirect('/datamobil')->with(['success' => 'Data Berhasil Diupdate']);
        } else {
            return redirect('/datamobil')->with(['error' => 'Data Gagal Diupdate']);
        }
    }

    public function destroy($id)
    {
        $mobil = Mobil::find($id);

        // mendefinisikan letak folder foto
        $path = 'uploads/'.$mobil->photo;

        // menambahkan kondisi ketika ada file maka system akan menghapus file foto
        if(File::exists($path)){
            // logic hapus file di jalankan
            File::delete($path);
        }

        $mobil->delete();

        if ($mobil){
            return redirect('/datamobil')->with(['success' => 'Berhasil Delete data']);
        } else {
            return redirect('/datamobil')->with(['error' => 'Ada masalah Coi!']);
        }
    }
}

