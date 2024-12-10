<form action="{{route('zona.update', $zonas->id)}}" method="POST" enctype="multipart/form-data"> 
@csrf
@method('PUT')
<div>
    <label for="">Nombre de la Zona</label>
    <input type="text" name="nombre_zona" placeholder="Ingresa el nombre de la nueva Zona" value="{{$zonas->nombre_zona}}">
</div>
<div>
    <input type="submit" value="Enviar">
</div>
</form>