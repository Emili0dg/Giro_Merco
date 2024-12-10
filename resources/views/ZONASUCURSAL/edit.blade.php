<form action="{{route('sucursal.update', $sucursales->id)}}" method="POST" enctype="multipart/form-data">
@csrf
<div>
    <label for="">Nombre de la sucursal</label>
    <input type="text" name="nombre_sucursal" placeholder="Ingresa el nombre de la sucursal" value="{{$sucursales->nombre_sucursal}}">
</div>
<div>
    <label for="">Horario</label>
    <input type="text" name="horario" placeholder="Ingresa el nombre de la sucursal" value="{{$sucursales->horario}}">
</div>
<div>
    <label for="">Telefono</label>
    <input type="text" name="telefono" placeholder="Ingresa el nombre de la sucursal" value="{{$sucursales->telefono}}">
</div>
<div>
    <label for="">Mapa de Google</label>
    <input type="text" name="mapa" placeholder="Ingresa el nombre de la sucursal" value="{{$sucursales->mapa}}">
</div>
<div>
    <label for="">Como llegar</label>
    <input type="text" name="como_llegar" placeholder="Ingresa el nombre de la sucursal" value="{{$sucursales->como_llegar}}">
</div>
<div>
    <label for="">Zona</label>
    <select name="id_zona" class="sel">
        <option>Selecciona una opción</option>
        @foreach ($zona as $zonas)
        <option selected value="{{$zonas->id}}">{{$zonas->nombre_zona}}</option>
        @endforeach
    </select>
</div>
<div>
    <input type="submit" value="Enviar">
</div>
</form>