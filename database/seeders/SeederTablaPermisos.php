<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//agregamos el modelo de permisos de spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            'see-user',
            'create-user',
            'edit-user',
            'delete-user',
        
            //Operaciones sobre tabla roles
            'see-role',
            'create-role',
            'edit-role',
            'delete-role',

            //Operacions sobre tabla blogs
            'see-service',
            'create-service',
            'edit-service',
            'delete-service'
        ];

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}
