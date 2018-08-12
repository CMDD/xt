<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;

class RoleController extends Controller
{
    public function index(){
       $roles = Role::all();
       $permissions = Permission::get();
      return view('admin.configuracion.roles.crear')->with('roles',$roles)
                                                    ->with('permissions',$permissions);
    }

    public function store(Request $request){
      $role = new Role();
      $role->name = $request->nombre;
      $role->slug = $request->slug;
      $role->description = $request->description;
      $role->save();
      $role->permissions()->sync($request->permissions);
      return redirect()->route('roles.edit',$role->id);

    }

    public function edit(Role $role){
      $mispermisos = [];
      $roles = Role::all();
      $permissions = Permission::get();
      $colleccion = $role->getPermissions();
      foreach ($colleccion as $key => $value) {
        $mispermisos[] = $value;
      }
      return view('admin.configuracion.roles.edit')->with('roles',$roles)
                                                   ->with('permissions',$permissions)
                                                   ->with('role',$role)
                                                   ->with('mispermisos',$mispermisos);
    }

    public function eliminar(Role $role){
      $role->delete();
      return redirect()->action('RoleController@index');

    }

    public function update(Request $request,$id){
      $role = Role::find($id);
      $role->name = $request->nombre;
      $role->slug = $request->slug;
      $role->description = $request->description;
      $role->save();
      if ($request->permissions) {
       $role->permissions()->sync($request->permissions);
      }


      return redirect()->route('roles.edit',$role->id);
    }


}
