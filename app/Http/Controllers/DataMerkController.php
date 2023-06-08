<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\merk;

class DataMerkController extends Controller
{
    public function index()
    {
        $merks = merk::all();
        return view('datamerk', compact('merks'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $merk = new merk;
        $merk->nama_merk = $request->nama_merk;
        $merk->save();
        // $res = NULL;
        // $res->success = false;

        return redirect('/datamerk');
    }
    
    public function show()
    {

    }

    public function update($id, Request $request)
    {
        $merk = merk::find($id);
        $merk->id_merk = $request->id_merk;
        $merk->save();

        return redirect('/datamerk');
    }


    public function destroy($id)
    {
        merk::find($id)->delete();

        return redirect('/datamerk');
        
    }
}