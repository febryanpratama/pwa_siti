<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
        ]);

        $user->assignRole('Admin');

        $user = User::create([
            'name' => 'Bendahara',
            'email' => 'bendahara@bendahara.com',
            'password' => bcrypt('123456'),
        ]);

        $user->assignRole('Bendahara');

        $user = User::create([
            'name' => 'kepsek',
            'email' => 'kepsek@kepsek.com',
            'password' => bcrypt('123456'),
        ]);

        $user->assignRole('Kepsek');

        $user1 = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('123456'),
        ]);

        $user1->assignRole('user');
    }
}
