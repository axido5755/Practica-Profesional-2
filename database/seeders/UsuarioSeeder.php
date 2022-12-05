<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $UsuarioTest = [
            [
                'ID_Usuario' => 1,
                'ID_Rol' => 1,
                'Nombre' => 'Usuario_test',
                'Apellido' => 'Usuario_test',
                'Rut' => '9.999.999-9',
                'Email' => 'email@test',
                'Contraseña' => 'Usuariotest',
                'Activo' => true,
            ]
        ];
        DB::table('usuarios')->insert($UsuarioTest);
    }
}
