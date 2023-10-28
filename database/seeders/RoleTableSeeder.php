<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles=['admin', 'operator'];

        collect($roles)->map(function($name)
        {  
            Role::query()->updateOrCreate(compact('name'), compact('name'));
        });
    }
}
