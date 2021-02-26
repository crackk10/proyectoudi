@extends("theme.$theme.layout")


@section('metadata')
    <link rel="stylesheet" href="{{asset("assets/js/bootstrap-fileinput/css/fileinput.min.css")}}">
    <!-- Latest compiled and minified CSS -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
<meta name="csrf-token" content="{{csrf_token()}}"/>    
@endsection

@section('scriptsPlugins')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    
    <script src="{{asset("assets/js/bootstrap-fileinput/js/fileinput.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap-fileinput/js/locales/es.js")}}"></script>     
    <script src="{{asset("assets/js/bootstrap-fileinput/themes/fas/theme.min.js")}}"></script>  
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js" type="text/javascript"></script>
@endsection

@section('scripts')
    
    <script src="{{asset("assets/admin/productos/crear.js")}}"></script>    
@endsection

@section('contenido')
<!-- campo adjunto -->
<div class="form-group">
    <label for="adjunto" class="col-lg-3 control-label ">Adjunto</label>
    <div class="col-lg-8">
    <input  type="file" id="adjunto" name="adjunto" id="adjunto" class="form-control"  value="{{old('adjunto')}}" >
    </div>
</div>
<!-- /campo adjunto -->

@endsection
