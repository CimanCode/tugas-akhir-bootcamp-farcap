<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;

    public $guarde = ['id'];

    protected $table = 'role';

    function user(){
        return $this->hasOne(Users::class);
    }
}
