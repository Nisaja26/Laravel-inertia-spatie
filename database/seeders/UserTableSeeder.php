<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1 insert data user baru ke database dengan Eloquent

    
        //create user
        $user = User::create([
            'name'      => 'Syahrizaldev',
            'email'     => 'izaldev@gmail.com',
            'password'  => bcrypt('password'),
        ]);

        // Mengambil semua data user yang ada
        //get all permissions
        $permissions = Permission::all();

        // mencari role dengan ID 1
        //get role admin
        $role = Role::find(1);

        // assigent semua permissions yang ada dengan method syncPermissions
        //assign permission to role
        $role->syncPermissions($permissions);

        // setelah role tersebut sudah memiliki semua hak akses

        //assign role to user yang sudah dibuat
        $user->assignRole($role);
    }
}