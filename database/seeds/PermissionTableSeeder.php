<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Titular
          Permission::create([
            'name' => 'Crear titulares',
            'slug' => 'persona.create',
            'description' => 'Crea titulares al sistema'
          ]);
          Permission::create([
            'name' => 'Ver titulares del sistema',
            'slug' => 'persona.index',
            'description' => 'Lista y navega los titulares del sistema'
          ]);
          Permission::create([
            'name' => 'Ver detalle de un titular',
            'slug' => 'persona.show',
            'description' => 'Ver en detalle cada titular del sistema'
          ]);
          Permission::create([
            'name' => 'Edicion de titulares',
            'slug' => 'persona.edit',
            'description' => 'Editar cualquier dato de un titular del sistema'
          ]);
          Permission::create([
            'name' => 'Eliminar titular',
            'slug' => 'persona.destroy',
            'description' => 'Elimina cualquier  titular del sistema'
          ]);
    }
}
