<?php

use Illuminate\Database\Seeder;

class FacultadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facultades')->insert([
            'id' => '50001',
            'facultad' => 'Facultad de Ciencias y Tecnologia',
        ]);
        DB::table('facultades')->insert([
            'id' => '50002',
            'facultad' => 'Ciencias Economicas',
        ]);
        
    }
}
