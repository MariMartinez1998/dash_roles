<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class SeedersPermiso extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permisos = [
       'ver-rol',
       'crear-rol',
       'editar-rol',
       'borrar-rol',

       'ver-service',
       'crear-service',
       'editar-service',
       'borrar-service'
        ];

        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }

    }
}
