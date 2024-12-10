@extends('adminlte::page')

@section('title', 'Administrador Merco')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">You are logged in!</p>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-orange">
                            <div class="inner">
                                <h3 class="text-white">Sliders</h3>

                                <p class="text-white">Sección</p>
                            </div>
                            <div class="icon">
                                <i class="icon fas fa-carrot"></i>
                            </div>
                            <a href="{{url('/admin/sliders')}}" class="small-box-footer" style="color:white !important;">Ir <i class="fas fa-arrow-circle-right text-white"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                            <div class="inner">
                                <h3 class="text-white">Ofertas</h3>

                                <p class="text-white">Sección</p>
                            </div>
                            <div class="icon">
                                <i class="icon fas fa-carrot"></i>
                            </div>
                            <a href="{{url('/admin/sliders')}}" class="small-box-footer" style="color:white !important;">Ir <i class="fas fa-arrow-circle-right text-white"></i></a>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                            <div class="inner">
                                <h3 class="text-white">Estados</h3>

                                <p class="text-white">Sección</p>
                            </div>
                            <div class="icon">
                                <i class="icon fas fa-carrot"></i>
                            </div>
                            <a href="{{url('/admin/sliders')}}" class="small-box-footer" style="color:white !important;">Ir <i class="fas fa-arrow-circle-right text-white"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@stop
