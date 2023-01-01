<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_sperpat extends Model
{
    use HasFactory;
    public $guarded = ['id'];

    protected $table = 'data_sperpat';
}
