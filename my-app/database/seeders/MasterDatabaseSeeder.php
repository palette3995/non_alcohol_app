<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class MasterDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'age'=> 25,
            'password' => bcrypt('adminuser'),
        ]);

        $testUser = User::create([
            'name' => 'Test',
            'email' => 'test@example.com',
            'age'=> 18,
            'password' => bcrypt('testuser'),
        ]);

        $adminRole = Role::create(['name' => 'admin']);

        $adminUser->assignRole($adminRole);

    }
}
