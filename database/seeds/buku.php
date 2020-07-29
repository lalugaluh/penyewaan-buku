<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as faker;
use Illuminate\Support\Facades\DB;

class buku extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('bk');
        $buku = [];
        for ($i=1; $i <=10 ; $i++) { 
            $buku[] = [
                'kb' => Str::random(5),
                'nama_buku' => 'Buku '.$i,
                'penerbit' =>$faker->text(25),
                'penulis' =>$faker->text(50),

            ];
        }
        DB::table('buku')->insert($buku);
    }
}
