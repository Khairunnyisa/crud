<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VegetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * 
     */
    public function run():void
    {
       DB::table('vegetables')->insert(array(
        array(
            'nama-sayur' => 'Kangkung',
            'harga-sayur'     => '20000',
        ),
        array(
            'nama-sayur' => 'Bayam',
            'harga-sayur'     => '60000',
        ),
        array(
            'nama-sayur' => 'Brokoli',
            'harga-sayur'     => '10000',
        ),
        ));
    }
}
