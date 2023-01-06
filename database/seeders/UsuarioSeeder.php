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
            ],[
                'ID_Usuario' => 4,
                'ID_Rol' => 2,
                'Nombre' => 'profesional',
                'Apellido' => 'icinf',
                'Rut' => '9.999.999-9',
                'Email' => 'profesional-icinf-conce@ubiobio.cl',
                'Contraseña' => 'profesionalicinfconce',
                'Activo' => true,
            ],[
                'ID_Usuario' => 5,
                'ID_Rol' => 2,
                'Nombre' => 'Aaron',
                'Apellido' => 'Muñoz Vásquez',
                'Rut' => '9.999.999-9',
                'Email' => 'aaron.munoz1801@alumnos.ubiobio.cl',
                'Contraseña' => 'aaronmunozvasquez',
                'Activo' => true,
            ],[
                'ID_Usuario' => 6,
                'ID_Rol' => 2,
                'Nombre' => 'Andrés',
                'Apellido' => 'Águila Mendoza',
                'Rut' => '9.999.999-9',
                'Email' => 'andres.aguila1901@alumnos.ubiobio.cl',
                'Contraseña' => 'andresaguilamendoz',
                'Activo' => true,
            ],[
                'ID_Usuario' => 7,
                'ID_Rol' => 2,
                'Nombre' => 'Carlos',
                'Apellido' => 'Sánchez Cisterna',
                'Rut' => '9.999.999-9',
                'Email' => 'carlos.sanchez2002@alumnos.ubiobio.cl',
                'Contraseña' => 'carlossanchezcisterna',
                'Activo' => true,
            ],[
                'ID_Usuario' => 8,
                'ID_Rol' => 2,
                'Nombre' => 'Cristóbal',
                'Apellido' => 'González Gaete',
                'Rut' => '9.999.999-9',
                'Email' => 'cristobal.gonzalez1901@alumnos.ubiobio.cl',
                'Contraseña' => 'gonzalezgaete',
                'Activo' => true,
            ],[
                'ID_Usuario' => 9,
                'ID_Rol' => 2,
                'Nombre' => 'Fabián',
                'Apellido' => 'Rivera Cartes',
                'Rut' => '9.999.999-9',
                'Email' => 'fabian.rivera2001@alumnos.ubiobio.cl',
                'Contraseña' => 'fabianriveracartes',
                'Activo' => true,
            ],[
                'ID_Usuario' => 10,
                'ID_Rol' => 2,
                'Nombre' => 'Felipe',
                'Apellido' => 'Miranda Rebolledo',
                'Rut' => '9.999.999-9',
                'Email' => 'felipe.miranda2001@alumnos.ubiobio.cl',
                'Contraseña' => 'felipemirandarebolledo',
                'Activo' => true,
            ],[
                'ID_Usuario' => 11,
                'ID_Rol' => 2,
                'Nombre' => 'Francisco',
                'Apellido' => 'González Placencia',
                'Rut' => '9.999.999-9',
                'Email' => 'francisco.gonzalez1701@alumnos.ubiobio.cl',
                'Contraseña' => 'franciscogonzalezplacencia',
                'Activo' => true,
            ],[
                'ID_Usuario' => 12,
                'ID_Rol' => 2,
                'Nombre' => 'Marco',
                'Apellido' => 'Araneda Escobar',
                'Rut' => '9.999.999-9',
                'Email' => 'marco.araneda2001@alumnos.ubiobio.cl',
                'Contraseña' => 'marcoaranedaescobar',
                'Activo' => true,
            ],[
                'ID_Usuario' => 13,
                'ID_Rol' => 2,
                'Nombre' => 'Rodrigo',
                'Apellido' => 'Parra Godoy',
                'Rut' => '9.999.999-9',
                'Email' => 'rodrigo.parra1901@alumnos.ubiobio.cl',
                'Contraseña' => 'rodrigoparragodoy',
                'Activo' => true,
            ],[
                'ID_Usuario' => 14,
                'ID_Rol' => 2,
                'Nombre' => 'Tomás',
                'Apellido' => 'Saavedra Suazo',
                'Rut' => '9.999.999-9',
                'Email' => 'tomas.saavedra1901@alumnos.ubiobio.cl',
                'Contraseña' => 'tomassaavedrasuazo',
                'Activo' => true,
            ],[
                'ID_Usuario' => 15,
                'ID_Rol' => 2,
                'Nombre' => 'Víctor',
                'Apellido' => 'Herrera Merino',
                'Rut' => '9.999.999-9',
                'Email' => 'victor.herrera1901@alumnos.ubiobio.cl',
                'Contraseña' => 'victorherreramerino',
                'Activo' => true,
            ]
        ];
        DB::table('usuarios')->insert($UsuarioTest);
    }
}
