<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//Spatie
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
        $permisos=[
            
            //Tabla Roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol', 
            //Tabla Productos
            'ver-prod',
            'crear-prod',
            'editar-prod',
            'borrar-prod',
            //Tabla Categorias
            'ver-cat',
            'crear-cat',
            'editar-cat',
            'borrar-cat',
            //Tabla Users
            'ver-user',
            'crear-user',
            'editar-user',
            'borrar-user',
            //Tabla Clientes
            'ver-cli',
            'crear-cli',
            'editar-cli',
            'borrar-cli',
            //Tabla Proveedores
            'ver-prov',
            'crear-prov',
            'editar-prov',
            'borrar-prov'

        ];

        foreach ($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
