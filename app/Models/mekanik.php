<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class mekanik extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    protected $table = 'mekanik';
    protected static function boot()
    {
        parent::boot();

        static::creating( function($mekanik) {
            $mekanik->password = Hash::make($mekanik->password);
        });

        static::updating(function(mekanik $mekanik) {
            if($mekanik->isDirty(["password"])){
                $mekanik->password = Hash::make($mekanik->password);
            }
        });
    }
}
