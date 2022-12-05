<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'Nombre' => 'Admin',
                'Descripcion' => 'Tiene permisos para todo'
            ],
            [
                'Nombre' => 'Tutor',
                'Descripcion' => 'Es el encargado de las tutorias'
            ],
            [
                'Nombre' => 'Estudiante',
                'Descripcion' => 'Es un estudiante'
            ]
        ];
        DB::table('rols')->insert($roles);
    }
}
