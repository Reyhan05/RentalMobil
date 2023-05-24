<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class merk extends Model
{
    use HasFactory;
    protected $table = 'merk';

    public function mobils() {
        return $this->hasMany(Mobil::class, 'id_merk' ,'id');

    }
}
