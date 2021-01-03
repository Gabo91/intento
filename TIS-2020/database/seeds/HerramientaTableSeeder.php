<?php

use Illuminate\Database\Seeder;

class HerramientaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('herramientas')->insert([
            'id' => '50001',
            'nombre_herramienta' => 'Classroom',
        ]);
        DB::table('herramientas')->insert([
            'id' => '50002',
            'nombre_herramienta' => 'Zoom',
        ]);
        DB::table('herramientas')->insert([
            'id' => '50003',
            'nombre_herramienta' => 'GoogleMeet',
        ]);
        DB::table('herramientas')->insert([
            'id' => '50004',
            'nombre_herramienta' => 'Power Point',
        ]);
        DB::table('herramientas')->insert([
            'id' => '50005',
            'nombre_herramienta' => 'GEnially',
        ]);
        DB::table('herramientas')->insert([
            'id' => '50006',
            'nombre_herramienta' => 'Kahoot',
        ]);
    }
}
