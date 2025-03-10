<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create user
        $user = User::create([
            'name'      => 'Tan Malaka',
            'email'     => 'tanmalaka@gmail.com',
            'password'  => bcrypt('password'),
        ]);

        $user2 = User::create([
            'name'     => 'Soekarno',
            'email'     => 'soekarno@gmail.com',
            'password'  => bcrypt('password'),
        ]);

        //get all permissions
        $permissions = Permission::all();

        //get role admin
        $role_pemimpin = Role::find(1);
        $role_pegawai = Role::find(2);

        //assign permission to role
        $role_pemimpin->syncPermissions($permissions);
        $role_pegawai->syncPermissions($permissions);

        //assign role to user
        $user->assignRole($role_pemimpin);
        $user2->assignRole($role_pegawai);
    }
}
