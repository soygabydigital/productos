@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h4 class="page__heading">Editar Producto</h4>
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

                            {!! Form::model($producto,['method'=>'PUT','route'=>['productos.update',$producto->id]]) !!}
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Categoria</label>    
                                            {!! Form::select('categoria_id',$categorias,null,array('class'=>'form-control categoria_id','id'))  !!}                                      
                                          
                                        </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="">Genero</label>
                                                <label>Genero</label><br> 
                                                <select name="genero" class="form-control">               
                                                <option value="Unisex">Unisex</option>
                                                <option value="Dama">Dama</option>
                                                <option value="Caballero">Caballero</option>
                                                </select>
                                            </div>
                                            </div>    

                                    <div class="col-xs-12 col-sm-12 col-md-12"> 
                                    <div class="form-group">
                                        <label for="nombre_prod">Nombre</label>
                                        {!! Form::text('nombre_prod',null,array('class'=>'form-control'))  !!}
                                    </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="codigo">Codigo</label>
                                        {!! Form::text('codigo_prod',null,array('class'=>'form-control'))  !!}
                                    </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="precio_prod">Precio</label>
                                        {!! Form::text('precio_prod',null,array('class'=>'form-control'))  !!}
                                    </div>
                                    </div>                                   
                                      
                                    {!! Form::hidden('stock_prod',null)  !!} 

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