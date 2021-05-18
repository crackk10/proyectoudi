<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarCalendario;
use App\Models\Calendario;
use App\Models\Conductor;
use App\Models\Transportadora;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use SebastianBergmann\Type\ObjectType;
use stdClass;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/calendario/calendario');
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
    public function store(ValidarCalendario $request)
    {
        //
        if ( auth()->user()->tipo_usuario=="2" &&  auth()->user()->id_estado=="1"){
            if ($request->ajax()) { 
                $evento = new Calendario();
                $evento->fecha = $request->fecha;
                $evento->id_vehiculo = $request->id_vehiculo;
                $evento->id_conductor = $request->id_conductor;
                $evento->id_estado = $request->id_estado;
                $evento->comentario = $request->comentario;
                $evento->color = $request->color;
                $evento->origen = $request->origen;
                $evento->destino = $request->destino;
                $evento->id_usuario = $request->id_usuario;
                $evento->save();

                if ($evento->save()) {
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
     * @param  \App\Models\Calendario  $calendario
     * @return \Illuminate\Http\Response
     */
    public function show(Calendario $calendario)
    {
        //
        $DetalleEvento=Calendario::select()
        ->from('calendario')
        ->where('calendario.id','=',"$calendario")
        ->get();
        return response()->json($DetalleEvento);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calendario  $calendario
     * @return \Illuminate\Http\Response
     */
    public function edit(Calendario $calendario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calendario  $calendario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $calendario)
    {
        //
        if ( auth()->user()->tipo_usuario=="2" ||auth()->user()->tipo_usuario=="1" &&  auth()->user()->id_estado=="1"){
            if ($request->ajax()) {
                $registro=Calendario::findOrFail($calendario);
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
     * @param  \App\Models\Calendario  $calendario
     * @return \Illuminate\Http\Response
     */
    public function destroy( $calendario)
    {
        //
        if ( auth()->user()->tipo_usuario=="2" &&  auth()->user()->id_estado=="1"){
            $registro=Calendario::findOrFail($calendario);
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
        if ( auth()->user()->tipo_usuario=="2" ||auth()->user()->tipo_usuario=="1" &&  auth()->user()->id_estado=="1"){
            $eventos= Calendario::select('conductor.nombre','conductor.apellido','vehiculo.placa','calendario.*')              
            ->from('calendario')
            ->join('conductor','conductor.id','=','calendario.id_conductor')
            ->join('vehiculo','vehiculo.id','=','calendario.id_vehiculo')
            ->get();
            /* creo un objeto stdclass para almacenar los datos */
            $arrayDatos = new stdClass();
            $arrayDatos = array();
            /* Recorro la consulta y creo las variables titulo y fecha para asignar el 
            valor de los indices id,title,start y color */
            foreach ($eventos as $datos){
                $id=$datos->id;
                $titulo="Vehiculo : ".$datos->placa;
                $descripcion ="
                <table class='table table-hover'>
                    <tr>
                        <td>
                            sr(a)
                        </td>
                        <td>"
                            .$datos->nombre." ".$datos->apellido.
                        "</td>
                    </tr>

                    <tr>
                        <td>
                            comentarios
                        </td>
                        <td>"
                        .$datos->comentario.
                        "</td>
                    </tr>
                </table>";
            /* separo el contenido del campo fecha en dias y horas */
                list($dia, $hora, ) = explode(" ", $datos->fecha);
                $fecha=$dia."T".$hora;
                $color=$datos->color;
            /* creo un objeto stdclass para almacenar los datos y agregar cada uno al 
                arrayDatos*/
                $record = new stdClass();
                $record->id = $id;
                $record->title = $titulo;
                $record->descripcion = $descripcion;
                $record->start = $fecha;
                $record->color = $color;
            /* agrego los datos al arrayDAto parametro 1 = el array parametro 2 = el valor*/
                array_push($arrayDatos, $record);
                
        }
        }else{
            return back();
        }
    
        return response()->json($arrayDatos);
    }
        //consulta para rellenar el select en la seccion Create
        public function vehiculo(Vehiculo $vehiculo)
        {
            $vehiculo= Vehiculo::select('vehiculo.id','placa','id_estado','razon_social')
            ->from('vehiculo')
            ->join('transportadora','transportadora.id','=','vehiculo.id_transportadora')
            ->get();
            return response()->json($vehiculo); 
        }
        public function conductor(Conductor $conductor)
        {
            $conductor= Conductor::select('conductor.id','nombre','apellido','id_estado_conductor','id_estado','razon_social')
            ->from('conductor')
            ->join('transportadora','transportadora.id','=','conductor.id_transportadora')
            ->get();
            return response()->json($conductor);
            
        }
        public function evento(Request $request)
        {  
            $Detalle= Calendario::select()
            ->from('calendario')
            ->where('calendario.id','=',$request->idEvento)
            ->get();
            return response()->json($Detalle);
            
        }

}
