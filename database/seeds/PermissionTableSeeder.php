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
            'slug' => 'crear.titular',
            'description' => 'Crea titulares al sistema'
          ]);
          Permission::create([
            'name' => 'Ver titulares del sistema',
            'slug' => 'listar.titular',
            'description' => 'Lista y navega los titulares del sistema'
          ]);
          Permission::create([
            'name' => 'Ver detalle de un titular',
            'slug' => 'ver.titular',
            'description' => 'Ver en detalle cada titular del sistema'
          ]);
          Permission::create([
            'name' => 'Edicion de titulares',
            'slug' => 'editar.titular',
            'description' => 'Editar cualquier dato de un titular del sistema'
          ]);
          Permission::create([
            'name' => 'Eliminar titular',
            'slug' => 'eliminar.titular',
            'description' => 'Elimina cualquier  titular del sistema'
          ]);

          // Suscripciones
          Permission::create([
            'name' => 'Crear suscripciones',
            'slug' => 'crear.suscripcion',
            'description' => 'Crea suscripciones al sistema'
          ]);
          Permission::create([
            'name' => 'Ver suscripciones del sistema',
            'slug' => 'listar.suscripcion',
            'description' => 'Lista y navega las suscripciones del sistema'
          ]);
          Permission::create([
            'name' => 'Ver detalle de una suscripcion',
            'slug' => 'ver.suscripcion',
            'description' => 'Ver en detalle cada suscripcion del sistema'
          ]);
          Permission::create([
            'name' => 'Edicion de suscripcion',
            'slug' => 'editar.suscripcion',
            'description' => 'Editar cualquier dato de una suscripcion del sistema'
          ]);
          Permission::create([
            'name' => 'Eliminar suscripcion',
            'slug' => 'eliminar.suscripcion',
            'description' => 'Elimina cualquier  suscripcion del sistema'
          ]);
    }
}
