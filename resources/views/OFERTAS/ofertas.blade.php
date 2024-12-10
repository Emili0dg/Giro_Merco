@extends('adminlte::page')

@section('title', 'Administrador - Merco')

@section('content_header')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
@stop
<body>
@section('content')
    <div class="content-header">

        <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-md-12 text-center">

                <h1 class="m-0 text-dark">Ofertas</h1>

            </div>

        </div><!-- /.row -->

        </div><!-- /.container-fluid -->

    </div>
    <section class="content">

      <div class="container-fluid">

        <div class="row">

          <div class="col-12">



            <div class="card">

              <!-- /.card-header -->

              <div class="card-body">

                <div class="Create"> 

                  <div class="card-footer">

                    <a href="{{route('ofertas.create')}}" class="btn btn-success float-right"><i class="fas fa-plus"></i> Agregar</a>

                  </div>

                </div>

                <table id="example1" class="table table-bordered table-striped">

                  <thead>

                  <tr>

                    <th>#ID Oferta</th>

                    <th>Puesto</th>

                    <th>Sucursal donde está disponible</th>

                    <th>Division</th>

                    <th>Opciones</th>

                  </tr>

                  @foreach ($oferta_zonas as $ofertas)



                      <tr>

                        <td>
                            <p>Id_oferta = {{$ofertas->id_oferta}}</p>
                        </td>

                        <td>
                            <p>id_zona = {{$ofertas->id_zona}}</p>
                        </td>

                        <td>
                            <p>id_sucursal = {{$ofertas->id_sucursal}}</p>
                        </td>
                        
                        <td>
                            <p>{{$ofertas->imagen}}</p>
                        </td>

                        <td>

                          <div class="container-fluid">

                            <div class="row">

                              <div class="col-12 mb-3">

                                <a href="{{route('ofertas.edit', $ofertas->id_oferta)}}">Editar</a>

                              </div>

                            </div>

                          </div>

                          <form action="{{route('ofertas.delete', $ofertas->id_oferta)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Eliminar">
                            </form>



                        </td>

                      </tr>

                    @endforeach

                  </thead>

                  <tbody>

                    

                  </tbody>

                </table>

              </div>

              <!-- /.card-body -->

            </div>

            <!-- /.card -->

          </div>

          <!-- /.col -->

        </div>

        <!-- /.row -->

      </div>

      <!-- /.container-fluid -->

    </section>

@stop

</body>
</html>