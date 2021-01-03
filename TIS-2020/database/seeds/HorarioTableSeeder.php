<?php

use Illuminate\Database\Seeder;

class HorarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('horarios')->insert([
            'dia' => 'Lunes',
            'hora_inicio' => '9:45',
            'hora_fin' => '11:15',
            'id_grupo' => '50001',
        ]);
        DB::table('horarios')->insert([
            'dia' => 'Lunes',
            'hora_inicio' => '9:45',
            'hora_fin' => '11:15',
            'id_grupo' => '50001',
        ]);

        DB::table('horarios')->insert([
            'dia' => 'Martes',
            'hora_inicio' => '8:15',
            'hora_fin' => '9:45',
            'id_grupo' => '50002',
        ]);
        DB::table('horarios')->insert([
            'dia' => 'Miercoles',
            'hora_inicio' => '11:15',
            'hora_fin' => '12:45',
            'id_grupo' => '50002',
        ]);
        DB::table('horarios')->insert([
            'dia' => 'Jueves',
            'hora_inicio' => '6:45',
            'hora_fin' => '8:15',
            'id_grupo' => '50002',
        ]);

        DB::table('horarios')->insert([
            'dia' => 'Martes',
            'hora_inicio' => '18:45',
            'hora_fin' => '20:15',
            'id_grupo' => '50003',
        ]);
        DB::table('horarios')->insert([
            'dia' => 'Jueves',
            'hora_inicio' => '8:15',
            'hora_fin' => '9:45',
            'id_grupo' => '50003',
        ]);

        DB::table('horarios')->insert([
            'dia' => 'Martes',
            'hora_inicio' => '18:45',
            'hora_fin' => '20:15',
            'id_grupo' => '50004',
        ]);
        DB::table('horarios')->insert([
            'dia' => 'Jueves',
            'hora_inicio' => '8:15',
            'hora_fin' => '9:45',
            'id_grupo' => '50004',
        ]);

        DB::table('horarios')->insert([
            'dia' => 'Martes',
            'hora_inicio' => '18:45',
            'hora_fin' => '20:15',
            'id_grupo' => '50005',
        ]);
        DB::table('horarios')->insert([
            'dia' => 'Jueves',
            'hora_inicio' => '8:15',
            'hora_fin' => '9:45',
            'id_grupo' => '50005',
        ]);

        DB::table('horarios')->insert([
            'dia' => 'Miercoles',
            'hora_inicio' => '9:45',
            'hora_fin' => '11:15',
            'id_grupo' => '50006',
        ]);
        DB::table('horarios')->insert([
            'dia' => 'Jueves',
            'hora_inicio' => '8:15',
            'hora_fin' => '9:45',
            'id_grupo' => '50006',
        ]);

        DB::table('horarios')->insert([
            'dia' => 'Jueves',
            'hora_inicio' => '9:45',
            'hora_fin' => '11:15',
            'id_grupo' => '50007',
        ]);
        DB::table('horarios')->insert([
            'dia' => 'Viernes',
            'hora_inicio' => '11:15',
            'hora_fin' => '12:45',
            'id_grupo' => '50007',
        ]);

        DB::table('horarios')->insert([
            'dia' => 'Lunes',
            'hora_inicio' => '6:45',
            'hora_fin' => '8:15',
            'id_grupo' => '50008',
        ]);
        DB::table('horarios')->insert([
            'dia' => 'Martes',
            'hora_inicio' => '8:15',
            'hora_fin' => '9:45',
            'id_grupo' => '50008',
        ]);

        DB::table('horarios')->insert([
            'dia' => 'Martes',
            'hora_inicio' => '8:15',
            'hora_fin' => '9:45',
            'id_grupo' => '50009',
        ]);
        DB::table('horarios')->insert([
            'dia' => 'Jueves',
            'hora_inicio' => '9:45',
            'hora_fin' => '11:15',
            'id_grupo' => '50009',
        ]);

        DB::table('horarios')->insert([
            'dia' => 'Miercoles',
            'hora_inicio' => '17:15',
            'hora_fin' => '18:45',
            'id_grupo' => '500010',
        ]);
        DB::table('horarios')->insert([
            'dia' => 'Viernes',
            'hora_inicio' => '17:15',
            'hora_fin' => '18:45',
            'id_grupo' => '500010',
        ]);

        DB::table('horarios')->insert([
            'dia' => 'Miercoles',
            'hora_inicio' => '17:15',
            'hora_fin' => '18:45',
            'id_grupo' => '500011',
        ]);
        DB::table('horarios')->insert([
            'dia' => 'Viernes',
            'hora_inicio' => '17:15',
            'hora_fin' => '18:45',
            'id_grupo' => '500011',
        ]);

        DB::table('horarios')->insert([
            'dia' => 'Lunes',
            'hora_inicio' => '15:45',
            'hora_fin' => '17:15',
            'id_grupo' => '500012',
        ]);
        DB::table('horarios')->insert([
            'dia' => 'Martes',
            'hora_inicio' => '17:15',
            'hora_fin' => '18:45',
            'id_grupo' => '500012',
        ]);
        DB::table('horarios')->insert([
            'dia' => 'Miercoles',
            'hora_inicio' => '17:15',
            'hora_fin' => '18:45',
            'id_grupo' => '500012',
        ]);
    }
}
