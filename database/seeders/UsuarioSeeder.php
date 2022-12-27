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
                'Nombre' => 'admin',
                'Apellido' => 'admin',
                'Rut' => '9.999.999-9',
                'Email' => 'admin@admin',
                'Contraseña' => 'admin',
                'Activo' => true,
            ],[
                'ID_Usuario' => 2,
                'ID_Rol' => 2,
                'Nombre' => 'tutor',
                'Apellido' => 'tutor',
                'Rut' => '9.999.999-9',
                'Email' => 'tutor@tutor',
                'Contraseña' => 'tutor',
                'Activo' => true,
            ],            [
                'ID_Usuario' => 3,
                'ID_Rol' => 3,
                'Nombre' => 'estudiante',
                'Apellido' => 'estudiante',
                'Rut' => '9.999.999-9',
                'Email' => 'estudiante@estudiante',
                'Contraseña' => 'estudiante',
                'Activo' => true,
            ]
        ];
        DB::table('usuarios')->insert($UsuarioTest);
    }
}
