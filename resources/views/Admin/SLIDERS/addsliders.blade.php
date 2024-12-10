@extends('adminlte::page')

@section('title', 'Administrador - Merco')

@section('content_header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    /*
    .pick-slider{
        height: 25vw; line-height: 17vw;font-size: 12vw; color: white!important; text-align: center; cursor: pointer;
    }
    */
    #dropzone {
        position: relative;
        color: white;
        height: 30vw;
        line-height:15vw;
        margin: auto;
        text-align: center;
        width: 100%;
        cursor:pointer;
        background-color:#e2eaf1;
        overflow: hidden;
    }

    #dropzone.hover {
    border: 10px solid #FE5;
    color: #FE5;
    }
    #dropzone .camara{
        width:4vw !important;
        border-radius:0px;
    }

    #dropzone div {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-position:center;
    background-repeat:no-repeat;
    background-size:contain;
    color:#282828;
    }

    #dropzone img {
    vertical-align: middle;
    max-width: 100%;
    }

    #dropzone [type="file"] {
    cursor: pointer;
    position: absolute;
    opacity: 0;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width:100%;
    }

</style>
<body>
<h1 class="m-0 text-dark">Slider Create</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                @if(Session::has('flash_message_success_sliders'))
                    <div class="alert alert-error alert-block" style="background-color:green !important; color:white !important;">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{!! session('flash_message_success_sliders')  !!}</strong>
                    </div>
                @endif
                @if(Session::has('flash_message_error_sliders'))
                    <div class="alert alert-error alert-block" style="background-color:red !important; color:white !important;">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{!! session('flash_message_error_sliders')  !!}</strong>
                    </div>
                @endif
                <!--div class="row m-0">
                   	<div class="col-md-12 p-2 bg-orange opcion1 pick-slider">
                   		<i class="far fa-image"></i>
                   		<h2>Una sola imagen</h2>
                   	</div>
                    <div class="col-md-6 p-2 bg-success opcion2 pick-slider">
                   		<i class="far fa-images"></i>
                   		<h2>Dos imágenes</h2>
                   	</div>
                </div-->
                <form enctype="multipart/form-data" id="opcion1" action="{{route('sliders.create')}}" method="post">{{ csrf_field() }}
                    <div class="card-body">
                    <div class="form-group text-center p-4" style="background-color:#DEDEDE;">
                        <input type="hidden" value="1" name="seccion">
                        <div id="dropzone">
                                <div><img class="camara" src="{{asset('images/camara.png')}}" alt="camara"> <span>Da clic o arrastra elementos <br> Dimensiones: 1300px por 797px </span> </div>
                                <input type="file" name="imagenprincipal" id="file" accept="image/png, image/jpeg, image/jpg, image/webp" />
                        </div>
                        <label class="mt-3">Descripción de imagen:</label>
                        <input type="text" name="descripcion_imagenprincipal" required class="form-control" placeholder="Descripción de imagen:">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="habilitado" value="1" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Habilitado</label>
                    </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-success  mb-3 btn-flat">Agregar</button>
                    </div>
                </form>
                <!--form enctype="multipart/form-data" id="opcion2" action="{{url('/admin/add_sliders')}}" method="post">{{ csrf_field() }}
                    <div class="card-body">
                    <div class="form-group text-center p-4" style="background-color:#DEDEDE;">
                        <div class="form-group col-md-8 p-4 m-auto text-center" style="background-color:#EDEDED;">
                            <input type="hidden" value="1" name="seccion">
                            <div id="dropzone2">
                                <div><img class="camara" src="{{asset('images/camara.png')}}" alt="camara"> <span>Da clic o arrastra elementos <br> Dimensiones: 620px por 320px </span> </div>
                                <input type="file" name="imagen1" id="file" accept="image/png, image/jpeg, image/jpg, image/webp" />
                            </div>
                            <label >Descripción de imagen:</label>
                            <input type="text" name="descripcion_imagen1" required class="form-control" placeholder="Descripción de imagen:">
                        </div>
                        <div id="dropzone3">
                            <div><img class="camara" src="{{asset('images/camara.png')}}" alt="camara"> <span>Da clic o arrastra elementos <br> Dimensiones: 1300px por 797px </span> </div>
                            <input type="file" name="imagen2" id="file" accept="image/png, image/jpeg, image/jpg, image/webp" />
                        </div>
                        <label >Descripción de imagen:</label>
                        <input type="text" name="descripcion_imagen2" required class="form-control" placeholder="Descripción de imagen:">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="habilitado" value="1" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Habilitado</label>
                    </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-success  mb-3 btn-flat">Agregar</button>
                    </div>
                </form-->
            </div>
        </div>
    </div>
@stop

<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<!--script>
$(document).ready(function() {
  $("#opcion1").hide();
  //$("#opcion2").hide();
  
  // Resto de tu código
  function toggleOptions(optionToShow, optionToHide) {
        $(optionToShow).show("100");
        $(optionToHide).hide();
        $(".pick-slider").css({
            'height': '6vw',
            'line-height': '4vw',
            'font-size': '4vw'
        }).find("h2").hide();
    }

    $(document).on('click', '.opcion1', function() {
        toggleOptions("#opcion1", "#opcion2");
    });

    /*
    $(document).on('click', '.opcion2', function() {
        toggleOptions("#opcion2", "#opcion1");
    });
    */
});
    
</script-->

<script>
    $(document).ready(function() {
        $('#chooseFile1').on('change', function() {
            var $fileUpload = $(this).next(".file-upload");
            var filename = $(this).val().trim(); // Usamos trim() para eliminar los espacios en blanco iniciales/finales

            if (filename.length === 0) {
            $fileUpload.removeClass('active');
            $("#noFile1").text("Ningún archivo ha sido seleccionado...");
            } else {
            $fileUpload.addClass('active');
            // Eliminamos el "C:\fakepath\" utilizando split y pop para obtener solo el nombre del archivo
            $("#noFile1").text(filename.split('\\').pop());
            }
        });
    });
    
    $(function() {
        var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];

        $('#dropzone').on({
            'dragover': function(e) {
                e.preventDefault(); // Necesario para permitir el drop
                $(this).addClass('hover');
            },
            'dragleave': function() {
                $(this).removeClass('hover');
            }
        });

        $('#dropzone input').on('change', function(e) {
            var file = this.files[0];
            if (file && allowedTypes.includes(file.type)) {
            var reader = new FileReader();
            reader.onload = function(loadEvent) {
                $('#dropzone').css({
                    'background-image': 'url("' + loadEvent.target.result + '")',
                    'background-size': 'contain',
                    'background-repeat': 'no-repeat',
                    'background-position': 'center center'
                });
            };
            reader.readAsDataURL(file);
            } else {
            alert('File type not allowed.');
            this.value = ''; // Reset input
            }    
            $('#dropzone img').remove();
            $('#dropzone span').remove();
        });
    });
</script>
</body>
</html>