<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\loginUsuarios;
use App\Http\Requests\createUsuarios;
use App\Http\Requests\updateUsuarios;

use App\Models\usuarios;

use App\Models\pais;
use App\Models\ciudad;
use App\Models\tipo_identificacion;
use App\Models\rol;
use App\Models\estado;
use App\Models\especialidad;

class ususarioController extends Controller
{
    public function login()
    {
        return view('usuariosLogin');
    }

    public function acces(loginUsuarios $request){
        $user  = usuarios::where('identidad',$request->Identidad)->first();

        if(!(isset($user->identidad))){
            return redirect()->route('usuarios.login')->with('error','La identificacion no coincide con ninguno de nuestros registros, por favor verifiquela o registrese.');
        }elseif(!(password_verify($request->Password, $user->password))){
            return redirect()->route('usuarios.login')->with('error','El Password(clave) es incorrecto, intentelo nuevamente.');
        }elseif($user->estado_id != 4 ){
            return redirect()->route('usuarios.login')->with('error','El usuario se encuentra inactivo.');
        }
        
        session([
            'id' => $user->id,
            'name' => $user->nombre,
            'rol' => $user->rol_id
        ]);
        return redirect()->route('usuarios.index');
    }


    public function create(){
        $pais = pais::select('id','descripcion')->get();
        $ciudad = ciudad::select('id','descripcion','pais_id')->get();
        $tipoIdentificacion = tipo_identificacion::select('id','descripcion')->get();

        return view('usuariosCreate',compact('pais','ciudad','tipoIdentificacion'));
    }

    public function save(createUsuarios $request){

        $user = new usuarios();
        $user->nombre = $request->nombre;
        $user->password = $request->password;
        $user->rol_id = 3;
        $user->estado_id = 4;
        $user->identidad = $request->identidad;
        $user->tipo_identidad_id = $request->tipoIdentidad;
        $user->ciudad_id = $request->ciudad;
        $user->save();

        return redirect()->route('usuarios.login')->with('create','Se creo el usuario Correctamente.');
    }



    public function show(){
        $pais = pais::select('id','descripcion')->get();
        $ciudad = ciudad::select('id','descripcion','pais_id')->get();
        $tipoIdentificacion = tipo_identificacion::select('id','descripcion')->get();
        $user = usuarios::find(session('id'));

        return view('usuariosShow',compact('pais','ciudad','tipoIdentificacion','user'));
    }

    public function update(updateUsuarios $request){
        $user = usuarios::where('identidad',$request->identidad)->first();
        $user->nombre = $request->nombre;
        $user->password = $request->password;
        $user->tipo_identidad_id = $request->tipoIdentidad;
        $user->ciudad_id = $request->ciudad;
        $user->save();
        return redirect()->route('usuarios.store')->with('update','Usuario Actualizado');
    }

    public function updateAdm(Request $request){
        $user = usuarios::find($request->id);
        $identidadExist = usuarios::where('id','!=',$request->id)->where('identidad','=',$request->identidad)->count();

        if($identidadExist == 0){
            $user->identidad = $request->identidad;
        }
        $user->nombre = $request->nombre;
        $user->tipo_identidad_id = $request->tipo_identidad_id;
        $user->rol_id =$request->rol_id;
        $user->estado_id = $request->estado_id;
        $user->ciudad_id = $request->ciudad_id;

        if($request->rol_id == 2){
            $user->experiencia = $request->experiencia;
            $user->especialidad = $request->especialidad;
            $user->horaInicio = $request->horaInicio;
            $user->horaFinal = $request->horaFinal;
        }

        $user->save();
        return "1";
    }



    public function store(){
        $users = usuarios::
        select('usuarios.id as id','nombre','identidad','ciudad_id','C.descripcion as ciudad',
                'P.descripcion as pais','tipo_identidad_id','T.descripcion as TD','R.descripcion as rol')->
        where('rol_id','!=','1')->
        leftjoin('tipo_identificacion as T','T.id','=','usuarios.tipo_identidad_id')->
        leftjoin('ciudad as C','usuarios.ciudad_id',"=","C.id")->
        leftjoin('pais as P','C.pais_id','=','P.id')->
        leftjoin('rol as R','R.id','=','usuarios.rol_id')->
        get();
        $pais = pais::select('id','descripcion')->get();
        $ciudad = ciudad::select('id','descripcion','pais_id')->get();
        $tipoI = tipo_identificacion::select('id','descripcion')->get();
        $rol = rol::select('id','descripcion')->where('id','!=','1')->get();
        $estado = estado::select('id','descripcion')->where('id','>','3')->get();
        $especialidad = especialidad::select('id','descripcion')->get();

        return view('usuariosStore',compact('users','pais','ciudad',"tipoI",'rol',"estado","especialidad"));
    }

    public function find($id){
        $user = usuarios::find($id);
        return json_encode($user);
    }

}
