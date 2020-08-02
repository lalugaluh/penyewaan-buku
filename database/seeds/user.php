<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as faker;
use Illuminate\Support\Facades\DB;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $user = [];
        $kelamin = ['L', 'P'];
        for ($i = 1; $i <= 10; $i++) {
            $user[] = [
                'id' => Str::random(5),
                'name_lengkap' => $faker->name(),
                'jenis_kelamin' => $kelamin[rand(0, 1)],
                'alamat' => $faker->address(100),
                'email' => 'user' . $i . '@gmail.com'
            ];
        }
        DB::table('user')->insert($user);
    }
}
