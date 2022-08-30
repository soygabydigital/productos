@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h4 class="page__heading">Productos</h4>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                       @can('crear-prod')
                       <a class="btn btn-warning" href="{{ route('productos.create')}}">Nuevo</a>
                       @endcan

                       <table style="width: 100%;" class="table-sm table-hover mt-2">
                        <thead style="background-color: #6777ef;">                         
                            <th style="display:none;">Id</th>
                            <th style="color:#fff;">Categoria</th>
                            <th style="color:#fff;">Nombre</th>
                            <th style="color:#fff;">Codigo</th>
                            <th style="color:#fff;">Genero</th>
                            <th style="color:#fff;">precio</th>
                            <th style="color:#fff;">stock</th>
                            <th style="color:#fff;">Acciones</th>                          
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                            <tr>  
                                <td style="display:none;"> {{ $producto->id }} </td>
                                <td> {{ $producto->categoria->nombre }} </td>                            
                                <td> {{ $producto->nombre_prod }} </td>
                                <td> {{ $producto->codigo_prod }} </td>
                                <td> {{ $producto->genero }} </td>
                                <td> {{ $producto->precio_prod }} </td>
                                <td> {{ $producto->stock_prod }} </td> 

                                <td>
                                @can('editar-prod')    
                                <a class="btn btn-primary" href="{{ route('productos.show',$producto->id)}}">Mostrar</a>  
                                @endcan
                                </td>
                             
                            </tr>                                        
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination justify-content-end">
                        {!! $productos->links() !!}
                    </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
@endsection
