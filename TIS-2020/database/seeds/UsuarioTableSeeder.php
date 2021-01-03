<?php

use Illuminate\Database\Seeder;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'cod_sis' => '1010',
            'nombre' => 'Jack Jonhson',
            'cargo' => 'Docente',
            'ci' => '11111',
            'email' => 'jack@mail.com',
            'telefono' => '3323232',
            'password' => '$2y$10$NovbqBlnSkZYln/f4cwun.MAeKYGX7/mHpBqq7IsJ/vXDup4vqsYi',
        ]);
        DB::table('usuarios')->insert([
            'cod_sis' => '2020',
            'nombre' => 'Jonh Jackson',
            'cargo' => 'Docente',
            'ci' => '22222',
            'email' => 'jonh@mail.com',
            'telefono' => '425524',
            'password' => '$2y$10$NovbqBlnSkZYln/f4cwun.MAeKYGX7/mHpBqq7IsJ/vXDup4vqsYi',
        ]);
        DB::table('usuarios')->insert([
            'cod_sis' => '3030',
            'nombre' => 'Marilin Manson',
            'cargo' => 'Docente',
            'ci' => '33333',
            'email' => 'mark@mail.com',
            'telefono' => '16551',
            'password' => '$2y$10$NovbqBlnSkZYln/f4cwun.MAeKYGX7/mHpBqq7IsJ/vXDup4vqsYi',
        ]);
        DB::table('usuarios')->insert([
            'cod_sis' => '4040',
            'nombre' => 'Andrea Flores',
            'cargo' => 'Secretaria',
            'ci' => '44444',
            'email' => 'andrea@mail.com',
            'telefono' => '56951',
            'password' => '$2y$10$NovbqBlnSkZYln/f4cwun.MAeKYGX7/mHpBqq7IsJ/vXDup4vqsYi',
        ]);
        DB::table('usuarios')->insert([
            'cod_sis' => '1000',
            'nombre' => 'Admin',
            'cargo' => 'Administrador',
            'ci' => '1000',
            'email' => 'administrador@mail.com',
            'telefono' => '1000',
            'password' => '$2y$10$I8X5vsphfar63H6keJIEGOEt0yxWYch9ARgImFQp8zZbo7MHOf3ju',
        ]);
        DB::table('usuarios')->insert([
            'cod_sis' => '1414',
            'nombre' => 'Larry',
            'cargo' => 'Administrador',
            'ci' => '1414',
            'email' => 'adminlarry@mail.com',
            'telefono' => '1414',
            'password' => '$2y$10$NQQ.bYsDonwSrXQRjvl9S.DTDjEZPaVMGjDlmmPuZ/xZtr26/NhgW',
        ]);
    }
}
