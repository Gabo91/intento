<?php

use Illuminate\Database\Seeder;

class GrupoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grupos')->insert([
            'id' => '50001',
            'numero' => '1',
            'id_materia' => '50001',
            'sis_usuario' => '1010',
        ]);
        DB::table('grupos')->insert([
            'id' => '50002',
            'numero' => '2',
            'id_materia' => '50001',
            'sis_usuario' => '2020',
        ]);

        DB::table('grupos')->insert([
            'id' => '50003',
            'numero' => '1',
            'id_materia' => '50002',
            'sis_usuario' => '1010',
        ]);
        DB::table('grupos')->insert([
            'id' => '50004',
            'numero' => '2',
            'id_materia' => '50002',
            'sis_usuario' => '3030',
        ]);

        DB::table('grupos')->insert([
            'id' => '50005',
            'numero' => '1',
            'id_materia' => '50003',
            'sis_usuario' => '1010',
        ]);
        DB::table('grupos')->insert([
            'id' => '50006',
            'numero' => '2',
            'id_materia' => '50003',
            'sis_usuario' => '2020',
        ]);
        DB::table('grupos')->insert([
            'id' => '50007',
            'numero' => '3',
            'id_materia' => '50003',
            'sis_usuario' => '3030',
        ]);

        DB::table('grupos')->insert([
            'id' => '50008',
            'numero' => '1',
            'id_materia' => '50004',
            'sis_usuario' => '2020',
        ]);
        DB::table('grupos')->insert([
            'id' => '50009',
            'numero' => '2',
            'id_materia' => '50004',
            'sis_usuario' => '3030',
        ]);
        DB::table('grupos')->insert([
            'id' => '500010',
            'numero' => '3',
            'id_materia' => '50004',
            'sis_usuario' => '1010',
        ]);

        DB::table('grupos')->insert([
            'id' => '500011',
            'numero' => '1',
            'id_materia' => '50005',
            'sis_usuario' => '3030',
        ]);
        DB::table('grupos')->insert([
            'id' => '500012',
            'numero' => '2',
            'id_materia' => '50005',
            'sis_usuario' => '2020',
            'created_at' => '2020-12-29 03:09:06',
            'updated_at' => '2020-12-29 03:09:06',
        ]);
    }
}
