<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\Usuario;


class UsuariosController extends Controller
{
    //UsuariosController para registro
    public function registrarUsuario(Request $request){

      try {
        $name = $request->name;
        $correo = $request->email;
        $pasword = $request->password;
        //validacion
        if ($name == null) {
          return redirect()->back()->with([
            'titulo' => 'nombre',
            'mensaje' => 'falla',
            'tipo' => 'warning'
          ]);
        }if ($correo == null) {
          return redirect()->back()->with([
            'titulo' => 'correo',
            'mensaje' => 'falla',
            'tipo' => 'warning'
          ]);
        }else if ($pasword == null) {
          return "La contraseña no debe estar vacío";
        }

        $variable = 'El correo registrado es ' . $correo;
        //transacciones
        DB::beginTransaction();
        Usuario::create([
          'nombre' => $name,
          'correo' => $correo,
          'password' => Hash::make($pasword)
        ]);

        DB::commit();

        return redirect()->route('VerWelcome');

      } catch (\Exception $e) {
        DB::rollback();
        return $e->getMessage();
      }
    }
    public function verWelcome(Request $request){
      try {
        $usuarios = Usuario::select('id','nombre','correo')->get();
        return view('welcome', compact('usuarios'));

      } catch (\Exception $e) {
        return $e->getMessage();
      }


    }

}
