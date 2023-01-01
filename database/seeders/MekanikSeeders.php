<?php

namespace Database\Seeders;

use App\Models\mekanik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MekanikSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        mekanik::query()->create([
            'username' => 'mekanik',
            'email' => 'mekanik@gmail.com',
            'password' => 'mekanik123',
            'role_id' => 3
        ]);
    }
}
