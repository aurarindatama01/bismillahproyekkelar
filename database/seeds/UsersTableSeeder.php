<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'aana',
            'username' => 'aana',
            'email' => 'aana@example.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'niken',
            'username' => 'nikem',
            'email' => 'niken@example.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'siswa',
            'kelas' => 'VII-G',
            'tahun_masuk' => '2003',
            'username' => 'siswa',
            'email' => 'siswa@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
