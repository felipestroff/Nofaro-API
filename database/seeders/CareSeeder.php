<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pet = DB::table('pets')->where('name', 'Bolinha')->first();

        DB::table('cares')->insert([
            [
                'pet_id' => $pet->id,
                'description' => 'Recebeu a primeira dose da vacina da gripe',
                'cared_at' => '2020-06-03'
            ]
        ]);
    }
}
