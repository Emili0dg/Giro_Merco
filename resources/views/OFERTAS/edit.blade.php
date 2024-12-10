@extends('adminlte::page')

@section('title', 'Administrador - Merco')

@section('content_header')
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <title></title>
    </head>
@stop
    <body>
        @section('content')

            <form action="{{route('ofertas.update', $edit->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div>
                    <label for="">Imagen</label>
                    <input type="file" name="imagen">
                    @foreach ($oferta as $ofertas)
                        <input type="hidden" name="imagen" value="{{$ofertas->imagen}}">
                    @endforeach
                </div>
                <div>
                    <label for="">Fecha</label>
                    <input type="date" name="fecha" id="" value="{{$edit->fecha}}">
                </div>
                <div>
                    <label for="">Tipo</label>
                    <select name="tipo" id="">
                        <option value="">Selecciona tipo</option>
                        <option value="1" @if ($edit->tipo == 1) selected @endif>Oferta del dia</option>
                        <option value="2" @if ($edit->tipo == 2) selected @endif>Oferta de la semana</option>
                        <option value="3" @if ($edit->tipo == 3) selected @endif>Oferta de la temporada</option>
                    </select>
                </div>
                <div>
                    <label for=""><b>Zonas</b></label><br>
                    @foreach ($zona as $zonas)
                        <input class="zona" id="{{$zonas->id}}" type="checkbox" name="id_zona" value="{{$zonas->id}}" @foreach ($oferta as $ofertas) @if($zonas->id == $ofertas->id_zona) checked @endif @endforeach>
                        <label for="">{{$zonas->nombre_zona}}</label>
                    @endforeach
                </div>
                <div>
                    <label for=""><b>Sucursales</b></label><br>
                    @foreach ($sucursal as $sucursales)
                        <input class="accesos" id="check{{$sucursales->id}}" data-sucursal="{{$sucursales->id_zona}}" type="checkbox" name="sucursal[]" value="{{$sucursales->id}}" @foreach ($oferta as $ofertas) @if($sucursales->id == $ofertas->id_sucursal) checked @endif @endforeach>
                        <label for="">{{$sucursales->nombre_sucursal}}</label>   
                    @endforeach
                </div>
                <div>
                    <input type="checkbox" name="habilitado" id="" value="1" @if ($edit->habilitado == 1) checked @endif>
                    <label for="">Habilitado</label>
                </div>
                <div>
                    <input type="submit" value="Enviar">
                </div>
            </form>
        @stop
    </body>

    <script>
        $( ".zona" ).change(function() {
            var id = $(this).attr('id');
            if($(this).is(':checked')) {
            $( ".accesos" ).each(function( index ) {
                var dataZona = $(this).attr('data-sucursal');
                if(dataZona == id){
                $(this).prop('checked', true);
                }
            });
            }else{
            $( ".accesos" ).each(function( index ) {
                var dataZona = $(this).attr('data-sucursal');
                if(dataZona == id){
                $(this).prop('checked', false);
                }
            });
            }
        });
    </script>
</html>