@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h4 class="page__heading">Editar Cliente</h4>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            @if ($errors->any())
                            <div style="width: 100%;" class="alert alert-light alert-dismissible fade show" role="alert">
                            <strong>Revise los campos</strong>
                            @foreach ($errors->all() as $error)
                                <span class="badge badge-primary">{{$error}}</span>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div> 
                            @endif
                            
                            {!! Form::model($cliente,['method'=>'PUT','route'=>['clientes.update',$cliente->id]]) !!}
                                <div class="row">
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-12"> 
                                    <div class="form-group">
                                        <label for="nombre">DNI</label>
                                        {!! Form::text('dni_cliente',null,array('class'=>'form-control'))  !!}
                                    </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion">Nombre</label>
                                        {!! Form::text('nombre_cliente',null,array('class'=>'form-control'))  !!}
                                    </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion">Direccion</label>
                                            {!! Form::text('direccion_cliente',null,array('class'=>'form-control'))  !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion">Telefono</label>
                                            {!! Form::text('telefono_cliente',null,array('class'=>'form-control'))  !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion">Correo</label>
                                            {!! Form::email('correo_cliente',null,array('class'=>'form-control'))  !!}
                                        </div>
                                    </div>
                                    

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>

                                </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
@endsection