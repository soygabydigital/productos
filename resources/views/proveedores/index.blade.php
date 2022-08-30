@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h4 class="page__heading">Proveedores</h4>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                       @can('crear-prov')
                       <a class="btn btn-warning" href="{{ route('proveedors.create')}}">Nuevo</a>
                       @endcan

                       <table class="table table-striped mt-2">
                        <thead style="background-color: #6777ef;">                         
                            <th style="display:none;">Id</th>                         
                            <th style="color:#fff;">DNI</th>                         
                            <th style="color:#fff;">Nombre</th>
                            <th style="color:#fff;">Direccion</th>
                            <th style="color:#fff;">Telefono</th>
                            <th style="color:#fff;">Correo</th>

                            <th style="color:#fff;">Acciones</th>                          
                        </thead>
                        <tbody>
                            @foreach ($proveedores as $proveedor)
                            <tr>  
                                <td style="display:none;"> {{ $proveedor->id }} </td>                            
                                <td> {{ $proveedor->dni_proveedor }} </td>
                                <td> {{ $proveedor->nombre_proveedor }} </td>    
                                <td> {{ $proveedor->direccion_proveedor }} </td>  
                                <td> {{ $proveedor->telefono_proveedor }} </td>  
                                <td> {{ $proveedor->correo_proveedor }} </td>                             
                                <td>
                                @can('editar-prov')
                                <a class="btn btn-primary" href="{{ route('proveedors.edit',$proveedor->id)}}">Editar</a>
                                @endcan

                                @can('borrar-prov')
                                {!! Form::open(['method'=>'DELETE','route'=>['proveedors.destroy',$proveedor->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Borrar',['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                @endcan                            
                              
                                </td>
                             
                            </tr>                                        
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination justify-content-end">
                        {!! $proveedores->links() !!}
                    </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
@endsection
