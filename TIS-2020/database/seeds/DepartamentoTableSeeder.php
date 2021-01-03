<?php

use Illuminate\Database\Seeder;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamentos')->insert([
            'id' => '50001',
            'departamento' => 'Departamento de Informatica y sistemas',
            'id_facultad' => '50001',
        ]);
        DB::table('departamentos')->insert([
            'id' => '50002',
            'departamento' => 'Departamento de Electromecanica',
            'id_facultad' => '50001',
        ]);
        DB::table('departamentos')->insert([
            'id' => '50003',
            'departamento' => 'Departamento de Electronica',
            'id_facultad' => '50001',
        ]);
    }
}
