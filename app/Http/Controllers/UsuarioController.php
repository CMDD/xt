<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Region;
use App\Cargo;
use Auth;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Support\Collection as Collection;
class UsuarioController extends Controller
{
    public function crear(){
      $usuarios = User::all();
      $roles = Role::all();
      $regiones = Region::all();
      $cargos = Cargo::all();
      return view('admin.usuario.crear')->with('usuarios',$usuarios)
                                        ->with('roles',$roles)
                                        ->with('regiones',$regiones)
                                        ->with('cargos',$cargos);
    }

    public function verificar(Request $request){
      if (Auth::attempt(['email'=>$request['usuario'], 'password'=>$request['pass']])) {
        return redirect('ixtus');
      }
      return back();
    }
    public function logout(){
      Auth()->logout();
      return view('login');
    }

    public function cambioPass(Request $request,$id){
      $user = User::find($id);
      $user->password = bcrypt($request->pass);
      $user->save();
      alert()->success('Contraseña cambiada!', 'Correctamente');
      return back();

    }
    public function destroy(User $user){
      $user->delete();
      alert()->success('Usuario eliminado!', 'Correctamente');
      return back();

    }

    public function store(Request $request){

      $user = new User();
      $user->name = $request->nombres;
      $user->apellidos = $request->apellidos;
      $user->email = $request->email;
      $user->cedula = $request->cedula;
      $user->password = bcrypt($request->pass);
      $user->regional = $request->regional;
      $user->cargo = $request->cargo;
      $user->save();

      $user->roles()->sync($request->roles);
      return back();
    }

    public function edit($id){
      $role =[];
      $usuarios = User::all();
      $usuario = User::find($id);
      $roles = Role::get();
      $colleccion = $usuario->getRoles();

      foreach ($colleccion as $key => $value) {
        $role[] = $value;
      }

      // $role = Collection::make($colleccion);
      $regiones = Region::all();
      $cargos = Cargo::all();

      return view('admin.usuario.editar')->with('usuario',$usuario)
                                        ->with('roles',$roles)
                                        ->with('role',$role)
                                        ->with('regiones',$regiones)
                                        ->with('cargos',$cargos)
                                        ->with('usuarios',$usuarios);
    }


    public function update(Request $request,$id){
      $user = User::find($id);
      $user->name = $request->nombres;
      $user->apellidos = $request->apellidos;
      $user->email = $request->email;
      $user->cedula = $request->cedula;
      $user->telefono = $request->telefono;
      if ($request->pass) {
        $user->password = bcrypt($request->pass);
      }

      $user->regional = $request->regional;
      $user->cargo = $request->cargo;
      $user->save();
      $user->roles()->sync($request->roles);


      return redirect()->route('editar.usuario',$user->id);

    }
}
