<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarProductos;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin/productos/index');
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
            return view('admin/productos/crear');
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
    public function store(ValidarProductos  $request)
    {
        //
        if ( auth()->user()->tipo_usuario=="2" &&  auth()->user()->id_estado=="1"){
            if ($request->ajax()) { 
                $producto = new Producto();
                $producto->nombre = $request->nombre;
                $producto->valor = $request->valor;
                $producto->descripcion = $request->descripcion;
                $producto->save();

                if ($producto->save()) {
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
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
        if ( auth()->user()->tipo_usuario=="2" &&  auth()->user()->id_estado=="1"){
            $detalle= Producto::select()
            ->from('Producto')
            ->where('producto.id','=',"$producto->id")
            ->get();
            return view('admin/productos/editar',compact('detalle'));  
        }else{
            return back();
        }
     
        
       return view('admin/productos/detalle',compact('detalle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarProductos $request, Producto $producto)
    {
        if ( auth()->user()->tipo_usuario=="2" &&  auth()->user()->id_estado=="1"){
            if ($request->ajax()) {
                  $registro=Producto::findOrFail($producto->id);
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
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
        if ( auth()->user()->tipo_usuario=="2" &&  auth()->user()->id_estado=="1"){
            $registro=Producto::findOrFail($producto->id);
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
        if (auth()->user()->tipo_usuario=="2" &&  auth()->user()->id_estado=="1") {
            if ($request->filtro!="0" && $request->buscar!="") {
                $datos= Producto::select()
                ->orderBy('created_at','desc')
                ->from('producto')
                ->where([
                            ["$request->filtro",'LIKE',"$request->buscar%"]
                        ])
                ->paginate(6);
                return view('admin/productos/listar')->with('datos',$datos);
            }else
            {
                $datos= Producto::select()
                ->orderBy('created_at','desc')
                ->from('producto')
                ->paginate(6);
                return view('admin/productos/listar')->with('datos',$datos);
            } 
        }
    } 
}
