<style>
  table{
    table-layout: fixed;
    width: 250px;
}

  th, td {
    border: 1px ;
    width: 100px;
    word-wrap: break-word;
    
}
 #tabla .angosto {
    border: 1px ;
    width: 30px;
    word-wrap: break-word;
    
}
#tabla .medio {
    border: 1px ;
    width: 80px;
    word-wrap: break-word;
    
}
#tabla .ancho {
    border: 1px ;
    width: 170px;
    word-wrap: break-word;
    text-align: center;
}
</style>
<table id="tabla" class="table  table-hover">
    <thead>
      <tr>
        <th scope="col" class="angosto">#</th>
        <th scope="col">Transportadora</th>
        <th scope="col">Placa</th>
        <th scope="col">Remolque</th>
        <th scope="col">Capacidad</th>
        <th scope="col">email</th>
      </tr>
    </thead>
    <tbody>
     
      @foreach ($datos as $item)
        
        <tr>
          <th scope="row">
            {{$item->id}}
          </th>        
          <td>{{$item->razon_social}}</td>
          <td>{{$item->placa}}</td>
          <td>{{$item->remolque}}</td>
          <td>{{$item->capacidad}}</td>
          <td>   
            
            <a href="{{route('vehiculos/editar',$item->id)}}" style = "float: left" class="btn btn-default btn-xs">
              <h4>
                  <i class="fa fa-edit"></i> 
              </h4>
            </a>
          </td>
        </tr>
      @endforeach
      
    </tbody>
  </table>
  <div class="text-center">
    {!!$datos->links()!!}
  </div>
  