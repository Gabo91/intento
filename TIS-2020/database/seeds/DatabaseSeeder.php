<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(FacultadTableSeeder::class);
        $this->call(DepartamentoTableSeeder::class);
        $this->call(MateriaTableSeeder::class);
        $this->call(UsuarioTableSeeder::class);
        $this->call(GrupoTableSeeder::class);
        $this->call(PlataformaTableSeeder::class);
        $this->call(HerramientaTableSeeder::class);
        $this->call(HorarioTableSeeder::class);
    }
}
