<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarVehiculos;
use App\Models\Transportadora;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin/vehiculos/index');
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
            return view('admin/vehiculos/crear');
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
    public function store(ValidarVehiculos $request)
    {
        //
        if ( auth()->user()->tipo_usuario=="2" &&  auth()->user()->id_estado=="1"){
            if ($request->ajax()) { 
                $vehiculo = new Vehiculo();
                $vehiculo->placa = $request->placa;
                $vehiculo->id_transportadora = $request->id_transportadora;
                $vehiculo->remolque = $request->remolque;
                $vehiculo->capacidad = $request->capacidad;
                $vehiculo->save();

                if ($vehiculo->save()) {
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
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehiculo $vehiculo)
    {
        //
        if ( auth()->user()->tipo_usuario=="2" &&  auth()->user()->id_estado=="1"){
            $detalle= Vehiculo::select('transportadora.id_estado','vehiculo.*')
            ->from('vehiculo')
            ->join('transportadora','transportadora.id','=','vehiculo.id_transportadora')
            ->where('vehiculo.id','=',"$vehiculo->id")
            ->get();
            return view('admin/vehiculos/editar',compact('detalle'));  
        }else{
            return back();
        }
     
        
       return view('admin/vehiculos/detalle',compact('detalle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarVehiculos $request, Vehiculo $vehiculo)
    {
        //
        if ( auth()->user()->tipo_usuario=="2" &&  auth()->user()->id_estado=="1"){
            if ($request->ajax()) {
                  $registro=Vehiculo::findOrFail($vehiculo->id);
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
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculo $vehiculo)
    {
        //
        if ( auth()->user()->tipo_usuario=="2" &&  auth()->user()->id_estado=="1"){
            $registro=Vehiculo::findOrFail($vehiculo->id);
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
                $datos= Vehiculo::select('transportadora.razon_social','vehiculo.*')
                ->orderBy('created_at','desc')
                ->from('vehiculo')
                ->join('transportadora','transportadora.id','=','vehiculo.id_transportadora')
                ->where([
                    ["$request->filtro",'LIKE',"$request->buscar%"]
                    ])
                ->paginate(6);
                return view('admin/vehiculos/listar')->with('datos',$datos);
            }else
            {
                $datos= Vehiculo::select('transportadora.razon_social','vehiculo.*')
                ->orderBy('created_at','desc')
                ->from('vehiculo')
                ->join('transportadora','transportadora.id','=','vehiculo.id_transportadora')
                ->paginate(6);
                return view('admin/vehiculos/listar')->with('datos',$datos);
            }
        }else{
            return back();
        }
    }
}
