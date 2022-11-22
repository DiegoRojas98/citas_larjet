<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\citas;
use App\Models\usuarios;
use App\Models\especialidad;

use App\Http\Requests\createCitas;

class citasController extends Controller
{
    public function store(){
        if(session('rol') == 2){
            $columna = "asesor_id";
        }else if(session('rol') == 3){
            $columna = "cliente_id";
        }

        $citas = citas::
        select('citas.id as id','hora','fecha','C.nombre as cliente','A.nombre as asesor',
        'Es.descripcion as especilalidad','E.descripcion as estado')->
        leftjoin('usuarios as C','C.id','=','citas.cliente_id')->
        leftjoin('usuarios as A','A.id','=','citas.asesor_id')->
        leftjoin('especialidad as Es','Es.id','=','A.especialidad')->
        leftjoin('estado as E','E.id' ,"=","citas.estado")->
        where('estado','1')->
        where('fecha','>=',date("Y-m-d"))->
        where("$columna",'=',session('id'))->
        get();
        return view('citasStore', compact('citas'));
    }

    public function storeAdm(){
        $citas = citas::
        select('citas.id as id','hora','fecha','C.nombre as Cliente','A.nombre as Asesor','E.descripcion as estado')->
        leftjoin('usuarios as C','C.id','=','citas.cliente_id')->
        leftjoin('usuarios as A','A.id','=','citas.asesor_id')->
        leftjoin('estado as E','E.id' ,"=","citas.estado")->
        where('estado','1')->
        where('fecha','>=',date("Y-m-d"))->
        get();
        return view('citasStoreAdm', compact('citas'));
    }

    public function create(){
        $especialidad = especialidad::select('especialidad.id as id','especialidad.descripcion as descripcion')->
        distinct('especialidad.id')->
        leftjoin('usuarios as U','U.especialidad','=','especialidad.id')->
        where('U.especialidad',"!=","null")->
        where('U.rol_id','2')->
        where('U.estado_id','4')->
        get();
        $asesores = usuarios::where('rol_id',2)->get();


        return view('citasCreate',compact('especialidad','asesores'));
    }

    public function save(createCitas $request){
        $exist = citas::where('cliente_id',session('id'))->where('fecha',$request->fecha)->where('hora',$request->hora)->count();


        if($exist > 0){
            return redirect()->route('citas.store')->with('failed',"Ya cuenta con una cita asignada el mismo dia y a la misma hora seleccionada.");
        }

        $cita = new citas();
        $cita->hora = $request->hora;
        $cita->fecha = $request->fecha;
        $cita->asesor_id = $request->asesor_id;
        $cita->cliente_id = session('id');
        $cita->save();

        return redirect()->route('citas.store')->with('create','La cita se ha creado.');
    }

    public function find($asesor,$fecha)
    {
        $citas = citas::where('fecha',$fecha)->where('asesor_id',$asesor)->get();
        return $citas;
    }


    public function update(Request $request)
    {
        $cita = citas::find($request->id);
        $cita->estado = 0;
        $cita->save();

        
        if(session('rol') == 1){
            return redirect()->route('citas.storeAdm')->with('remove','Se elimino la cita correctaente');
        }else{
            return redirect()->route('citas.store')->with('remove','Se elimino la cita correctaente');
        }
    }

}
