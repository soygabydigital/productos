@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h4 class="page__heading">Categorias</h4>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                       @can('crear-cat')
                       <a class="btn btn-warning" href="{{ route('categorias.create')}}">Nuevo</a>
                       @endcan

                       <table style="width:100%;" class="table-sm table-hover mt-2">
                        <thead style="background-color: #6777ef;">                         
                            <th style="color:#fff;">Id</th>                         
                            <th style="color:#fff;">Nombre</th>                         
                            <th style="color:#fff;">Descripcion</th>
                            <th style="color:#fff;">Acciones</th>                          
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                            <tr>  
                                <td style="display:none;"> {{ $categoria->id }} </td>                            
                                <td> {{ $categoria->nombre }} </td>
                                <td> {{ $categoria->descripcion }} </td>                               
                                <td>
                                @can('editar-cat')
                                <a class="btn btn-primary" href="{{ route('categorias.edit',$categoria->id)}}">Editar</a>
                                @endcan

                                @can('borrar-cat')
                                {!! Form::open(['method'=>'DELETE','route'=>['categorias.destroy',$categoria->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Borrar',['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                @endcan                            
                              
                                </td>
                             
                            </tr>                                        
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination justify-content-end">
                        {!! $categorias->links() !!}
                    </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
@endsection
