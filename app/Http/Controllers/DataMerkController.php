<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\merk;

class DataMerkController extends Controller
{
    public function index()
    {
        $mobil = Mobil::with('mobils')->get();
        $merks = merk::all();
        return view('datamerk', compact('mobil', 'merks'));
    }

    public function create()
    {
        
    }

    public function store()
    {

    }
    
    public function show()
    {

    }

    public function update()
    {

    }


    public function destroy($id)
    {
        Mobil::find($id)->delete();

        return redirect('/datamerk');
    }
}
