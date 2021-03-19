<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarConductores;
use App\Models\Conductor;
use App\Models\Transportadora;
use Illuminate\Http\Request;

class ConductoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin/conductores/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if ( auth()->user()->tipo_usuario=="2"&&  auth()->user()->id_estado=="1" ){
            return view('admin/conductores/crear');
        }else{
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarConductores $request)
    {
        //
        if ( auth()->user()->tipo_usuario=="2" &&  auth()->user()->id_estado=="1"){
            if ($request->ajax()) { 
                $conductor = new Conductor();
                $conductor->id_transportadora = $request->id_transportadora;
                $conductor->id_estado_conductor = $request->id_estado_conductor;
                $conductor->apellido = $request->apellido;
                $conductor->nombre = $request->nombre;
                $conductor->tipo_documento = $request->tipo_documento;
                $conductor->documento = $request->documento;
                $conductor->telefono = $request->telefono;
                $conductor->email = $request->email;
                $conductor->tipo_licencia = $request->tipo_licencia;
                $conductor->save();

                if ($conductor->save()) {
                    return response()->json(['success'=>'true']);
                }else { 
                    return response()->json(['success'=>'false']);
                }
            }else{
                return back();
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conductor  $conductor
     * @return \Illuminate\Http\Response
     */
    public function show(Conductor $conductor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conductor  $conductor
     * @return \Illuminate\Http\Response
     */
    public function edit($conductor)
    {
        //
        
        
        if ( auth()->user()->tipo_usuario=="2" &&  auth()->user()->id_estado=="1"){
            $detalle= Conductor::select('transportadora.id_estado','conductor.*')
            ->from('conductor')
            ->join('transportadora','transportadora.id','=','conductor.id_transportadora')
            ->where('conductor.id','=',"$conductor")
            ->get();
            
            return view('admin/conductores/editar',compact('detalle'));  
        }else{
            return back();
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conductor  $conductor
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarConductores $request, $conductor)
    {
        //
        if ( auth()->user()->tipo_usuario=="2" &&  auth()->user()->id_estado=="1"){
            if ($request->ajax()) {
                  $registro=Conductor::findOrFail($conductor);
                  $formulario=$request->all();
                  $resultado=$registro->fill($formulario)->save();   
                  if ($resultado) {
                  return response()->json(['success'=>'true']);
                  }else {
                  return response()->json(['success'=>'false']);
                  }
            }  
        }else{
              return back();
             }
    }


    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conductor  $conductor
     * @return \Illuminate\Http\Response
     */
    public function destroy($conductor)
    {
        //
        
        if ( auth()->user()->tipo_usuario=="2" &&  auth()->user()->id_estado=="1"){
            $registro=Conductor::findOrFail($conductor);
            $resultado=$registro->delete();
            if ($resultado) {
            return response()->json(['success'=>'true']);
            }else {
            return response()->json(['success'=>'false']);
            }    
        }else{
            return back();
        }
    }
    //consulta para rellenar el select en la seccion Create
    public function transportadora(Transportadora $transportadora)
    {
        $transportadora= Transportadora::select('id','razon_social','id_estado')
        ->from('Transportadora')
        ->get();
        return response()->json($transportadora);
    }

    public function listar(Request $request){
        if ( auth()->user()->tipo_usuario=="2" &&  auth()->user()->id_estado=="1"){   
            if ($request->filtro!="0" && $request->buscar!="") {
                $datos= Conductor::select('transportadora.razon_social','estado.nombre_estado','conductor.*')
                ->orderBy('created_at','desc')
                ->from('conductor')
                ->join('transportadora','transportadora.id','=','conductor.id_transportadora')
                ->join('estado','estado.id','=','conductor.id_estado_conductor')
                ->where([
                    ["$request->filtro",'LIKE',"$request->buscar%"]
                    ])
                ->paginate(6);
                return view('admin/conductores/listar')->with('datos',$datos);
            }else
            {
                $datos= Conductor::select('transportadora.razon_social','estado.nombre_estado','conductor.*')
                ->orderBy('created_at','desc')
                ->from('conductor')
                ->join('transportadora','transportadora.id','=','conductor.id_transportadora')
                ->join('estado','estado.id','=','conductor.id_estado_conductor')
                ->paginate(6);
                return view('admin/conductores/listar')->with('datos',$datos);
            }
        }else{
            return back();
        }
    }
}
