<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class kepsekSeeder extends Seeder
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
            'name' => 'Kepala Sekolah',
            'email' => 'kepsek@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        $user->assignRole('Kepsek');
    }
}
