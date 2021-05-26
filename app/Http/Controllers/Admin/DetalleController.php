<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Detalle;
use Illuminate\Http\Request;

class DetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ( auth()->user()->tipo_usuario=="2"||auth()->user()->tipo_usuario=="1"  &&  auth()->user()->id_estado=="1"){
            if ($request->ajax()) { 
                $detalle = new Detalle();
                $detalle->fecha = $request->fecha;
                $detalle->id_calendario = $request->id_calendario;
                $detalle->id_proceso = $request->id_proceso;
                $detalle->id_producto = $request->id_producto;
                $detalle->peso = $request->peso;
                $detalle->save();

                if ($detalle->save()) {
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
     * Display the specified resource.
     *
     * @param  \App\Models\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request)
    {
        $id=$request->parametros['id'];
        $datos= Detalle::select('proceso.nombre','producto.nombre_producto','detalle.*')
        ->orderBy('created_at','asc')
        ->from('detalle')
        ->join('proceso','proceso.id','=','detalle.id_proceso')
        ->join('producto','producto.id','=','detalle.id_producto')
        ->where('detalle.id_calendario','=',"$id")
        ->paginate(6);  
        return response()->json($datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function edit(Detalle $detalle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detalle $detalle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function destroy( $detalle)
    {
        if ( auth()->user()->tipo_usuario=="2"|| auth()->user()->tipo_usuario=="1" &&  auth()->user()->id_estado=="1"){
            $registro=Detalle::findOrFail($detalle);
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
    public function listar(Request $request){
 
    }
}
