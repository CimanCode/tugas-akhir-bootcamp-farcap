<?php

namespace Database\Seeders;

use App\Models\Admin;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::query()->create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin123',
            'role_id' => 2
        ]);

        Admin::query()->create([
            'username' => 'mekanik',
            'email' => 'mekanik@gmail.com',
            'password' => 'mekanik123',
            'role_id' => 3
        ]);
    }
}
