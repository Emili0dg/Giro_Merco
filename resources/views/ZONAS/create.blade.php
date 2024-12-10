<form action="{{route('zona.store')}}" method="POST">
@csrf
<div>
    <label for="">Nombre de la Zona</label>
    <input type="text" name="nombre_zona" placeholder="Ingresa el nombre de la nueva Zona" >
</div>
<div>
    <input type="submit" value="Enviar">
</div>
</form>