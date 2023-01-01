<?php

namespace Database\Seeders;

use App\Models\role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        role::query()->create([
            'nama' => 'user'
        ]);
        role::query()->create([
            'nama' => 'admin'
        ]);
        role::query()->create([
            'nama' => 'mekanik'
        ]);
    }
}
