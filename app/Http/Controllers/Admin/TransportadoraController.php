<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarTransportadora;
use App\Models\Transportadora;
use Illuminate\Http\Request;

class TransportadoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin/transportadoras/index');
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
            return view('admin/transportadoras/crear');
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
    public function store(ValidarTransportadora $request)
    {
        if ( auth()->user()->tipo_usuario=="2" &&  auth()->user()->id_estado=="1"){
            if ($request->ajax()) { 
                $transportadora = new Transportadora();
                $transportadora->razon_social = $request->razon_social;
                $transportadora->nit = $request->nit;
                $transportadora->telefono = $request->telefono;
                $transportadora->direccion = $request->direccion;
                $transportadora->email = $request->email;
                $transportadora->id_estado = $request->id_estado;
                $transportadora->save();

                if ($transportadora->save()) {
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
     * @param  \App\Models\Transportadora  $transportadora
     * @return \Illuminate\Http\Response
     */
    public function show(Transportadora $transportadora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transportadora  $transportadora
     * @return \Illuminate\Http\Response
     */
    public function edit(Transportadora $transportadora)
    {
        if ( auth()->user()->tipo_usuario=="2" &&  auth()->user()->id_estado=="1"){
            $detalle= Transportadora::select()
            ->from('transportadora')
            ->where('transportadora.id','=',"$transportadora->id")
            ->get();
            return view('admin/transportadoras/editar',compact('detalle'));  
        }else{
            return back();
        }
     
        
       return view('admin/transportadora/detalle',compact('detalle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transportadora  $transportadora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transportadora $transportadora)
    {
        //
        if ( auth()->user()->tipo_usuario=="2" &&  auth()->user()->id_estado=="1"){
            if ($request->ajax()) {
                  $registro=Transportadora::findOrFail($transportadora->id);
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
     * @param  \App\Models\Transportadora  $transportadora
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transportadora $transportadora)
    {
        //
        if ( auth()->user()->tipo_usuario=="2" &&  auth()->user()->id_estado=="1"){
            $registro=Transportadora::findOrFail($transportadora->id);
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
        if ( auth()->user()->tipo_usuario=="2" &&  auth()->user()->id_estado=="1"){   
            if ($request->filtro!="0" && $request->buscar!="") {
                $datos= Transportadora::select('estado.nombre','transportadora.*')
                ->orderBy('created_at','desc')
                ->from('transportadora')
                ->join('estado','estado.id','=','transportadora.id_estado')
                ->where([
                    ["$request->filtro",'LIKE',"$request->buscar%"]
                    ])
                ->paginate(6);
                return view('admin/transportadoras/listar')->with('datos',$datos);
            }else
            {
                $datos= Transportadora::select('estado.nombre','transportadora.*')
                ->orderBy('created_at','desc')
                ->from('transportadora')
                ->join('estado','estado.id','=','transportadora.id_estado')
                ->paginate(6);
                return view('admin/transportadoras/listar')->with('datos',$datos);
            }
        }else{
            return back();
        }
    } 
}
