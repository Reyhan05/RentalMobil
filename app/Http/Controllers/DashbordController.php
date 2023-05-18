<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;

class DashbordController extends Controller
{
    public function index()
    {
        $mobil = Mobil::get();
        return view('dashboard', compact('mobil'));
    }
}
