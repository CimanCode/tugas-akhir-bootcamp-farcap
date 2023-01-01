<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_service extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    protected $table = 'data_service';

    function pendaftaran(){
        return $this->belongsTo(pendaftaran::class);
    }

    function sperpat() {
        return $this->belongsTo(data_sperpat::class);
    }
}
