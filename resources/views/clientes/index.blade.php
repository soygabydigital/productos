@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h4 class="page__heading">Clientes</h4>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                       @can('crear-cli')
                       <a class="btn btn-warning" href="{{ route('clientes.create')}}">Nuevo</a>
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
                            @foreach ($clientes as $cliente)
                            <tr>  
                                <td style="display:none;"> {{ $cliente->id }} </td>                            
                                <td> {{ $cliente->dni_cliente }} </td>
                                <td> {{ $cliente->nombre_cliente }} </td>    
                                <td> {{ $cliente->direccion_cliente }} </td>  
                                <td> {{ $cliente->telefono_cliente }} </td>  
                                <td> {{ $cliente->correo_cliente }} </td>                             
                                <td>
                                @can('editar-cli')
                                <a class="btn btn-primary" href="{{ route('clientes.edit',$cliente->id)}}">Editar</a>
                                @endcan

                                @can('borrar-cli')
                                {!! Form::open(['method'=>'DELETE','route'=>['clientes.destroy',$cliente->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Borrar',['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                @endcan                            
                              
                                </td>
                             
                            </tr>                                        
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination justify-content-end">
                        {!! $clientes->links() !!}
                    </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
@endsection
