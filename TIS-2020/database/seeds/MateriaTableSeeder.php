<?php

use Illuminate\Database\Seeder;

class MateriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materias')->insert([
            'id' => '50001',
            'nombre' => 'TIS',
            'codigo_materia' => '95632',
            'id_departamento' => '50001',
        ]);
        DB::table('materias')->insert([
            'id' => '50002',
            'nombre' => 'Elementos de la Programacion',
            'codigo_materia' => '12121',
            'id_departamento' => '50001',
        ]);
        DB::table('materias')->insert([
            'id' => '50003',
            'nombre' => 'Introduccion a la Programacion',
            'codigo_materia' => '13264',
            'id_departamento' => '50001',
        ]);
        DB::table('materias')->insert([
            'id' => '50004',
            'nombre' => 'Algebra I',
            'codigo_materia' => '46165',
            'id_departamento' => '50001',
        ]);
        DB::table('materias')->insert([
            'id' => '50005',
            'nombre' => 'Fisica Basica',
            'codigo_materia' => '9812163',
            'id_departamento' => '50001',
            'created_at' => '2020-12-29 03:09:06',
            'updated_at' => '2020-12-29 03:09:06',
        ]);
    }
}
