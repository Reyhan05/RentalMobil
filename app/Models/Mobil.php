<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = 'mobil';

    public function mobils() {
        return$this->belongsTo(merk::class, 'id' ,'id_merk');


    }
}
