<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Users extends Model
{
    use HasFactory;
    public $guarded = ['id'];

    protected $table = 'user';
    protected static function boot()
    {
        parent::boot();

        static::creating( function($Users) {
            $Users->password = Hash::make($Users->password);
        });

        static::updating(function(Users $Users) {
            if($Users->isDirty(["password"])){
                $Users->password = Hash::make($Users->password);
            }
        });
    }
}
