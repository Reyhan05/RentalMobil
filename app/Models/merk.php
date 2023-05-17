<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class merk extends Model
{
    use HasFactory;
    protected $table = 'merk';

    public function mobil() {
        return$this->beloongsTo(mobil::class, 'id_merk' ,'id');
    }
}
