<?php

use Illuminate\Database\Seeder;

class PlataformaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plataformas')->insert([
            'id' => '50001',
            'nombre_plataforma' => 'Moodle 3',
        ]);
        DB::table('plataformas')->insert([
            'id' => '50002',
            'nombre_plataforma' => 'Moodle 2',
        ]);
        DB::table('plataformas')->insert([
            'id' => '50003',
            'nombre_plataforma' => 'Caroline',
        ]);
    }
}
