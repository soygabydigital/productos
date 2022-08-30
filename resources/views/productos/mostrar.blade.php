@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h4 class="page__heading">Detalles del Producto</h4>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-sm">
                        <div class="card-body-sm">
                            

                            <div class="row" style="padding-left: 5%;">
                                <div class="col-5"> 
                            <div style="margin: auto;">
                        
                                @php
                                     //$foto = "asset/images/$producto->codigo_prod.jpg"; 
                                    $foto =  'images/'.$producto->codigo_prod.'.jpg';
                                    // $caja="asset/images/caja.jpg";
                                    $caja =  'images/caja.jpg';                      
                                   
                                @endphp
                             
                               <!--<img style="width: 70%; border-radius: 1em;" src="{{ asset( $caja ) }}" alt="">
                               -->
                                @if (file_exists($foto))
                                  {{--$foto--}}
                                  <img style="width: 70%; border-radius: 1em;" src={{ asset($foto) }} alt=""> 
                                  
                                @else
                                  {{--$caja--}}
                                   <img style="width: 70%; border-radius: 1em;" src={{ asset($caja) }} alt="">    
                                   
                                @endif           
                                
                               <br><br>
                                <table class="justify-content-center"> 
                                    <td>                                   
                                        <a class="btn btn-primary" href="{{ route('productos.edit',$producto->id)}}">Editar</a>
                                    </td> 
                                    
                                    @if ($producto->stock_prod<=0) 
                                    
                                    <td> 
                                    @can('borrar-prod')
                                        {!! Form::open(['method'=>'DELETE','route'=>['productos.destroy',$producto->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Borrar',['class'=>'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan      
                                    </td> 
                                    
                                    @else 
                                    <td> 
                                        <button class="btn btn-danger disabled" type="submit">Eliminar</button> 
                                    </td> 
                                    @endif                        
                                </table> 
                    </div> <!--CENTRADO-->
                        </div> 
                        
                        <div class="row card" style="width: 50%;">
                             <div>  
                                <div class="card-header-sm text-center" style="height: 3em; color:#6777ef;">
                                        <h4> <strong>{{ $producto->nombre_prod }}</strong></h4> 
                                 </div><!-- Card Header -->
                                    <div class="card-body-sm" style="padding-left: 10em;">  
                                        <P> <strong>Categoría: </strong> {{ $producto->categoria->nombre }} <br>     
                                            <strong>Genero: </strong> {{ $producto->genero }} <br>         
                                            <strong> Código:</strong> {{ $producto->codigo_prod }}<br> 
                                            <strong> Precio:</strong> {{ $producto->precio_prod }} &#8364;<br> 
                                            <strong> Stock disponible:</strong> {{ $producto->stock_prod }}</p> 
                                            
                        
                                 <table> 
                        
                                 <td> 

                                        <form action="/compra/{{($producto->id)}}" method ="POST" > 
                                            @csrf @method('get') 
                                            <button class="btn btn-primary" type="submit">Comprar</button> 
                                        </form> 
                                    </td> 
                                    
                                    @if ($producto->stock_prod>0) 
                                    
                                    <td> 
                                        <form action="/venta/{{($producto->id)}}" method ="POST" > 
                                            @csrf @method('get') 
                                            <button class="btn btn-danger" type="submit">Vender</button> 
                                        </form> 
                                    </td> 
                                    
                                    @else 
                                    <td> 
                                        <button class="btn btn-danger disabled" type="submit">Vender</button> 
                                    </td> 
                                    @endif
                        
                        </table> 
                        </div><!-- card-body -->
                        </div> <!-- col-4 card --> 
                        </div> 
                        </div> 
                        </div> 
                        </div> <br> <!-- container -->


                        <div class="card" style="border-radius: 2em;">
                            <h6 class="card-header-md bg-light text-center"> 
                                <strong>HISTORIAL DEL PRODUCTO</strong> 
                            </h6>

                            <div class="card-body">
                            <table class="table-sm table-hover align-middle text-center" style="width: 100%;"> 
                                <thead class="bg-primary" style="color: #fff;">
                                        <td>Fecha</td>
                                        <td>Referencia</td>
                                        <td>Descripción</td>
                                        <td>De parte</td>
                                        <td>Total</td>
                                </thead>
                                
                                   
                                    @foreach ($historials as $historial)
                                
                                   <tbody>
                                    <td>{{ $historial->fecha }}</td>
                                    <td>{{ $historial->referencia }}</td>          
                                    
                                    
                                    @if ($historial->proveedor_id>0)
                                        <td>Se compraron {{ $historial->cantidad }} producto(s) y se agregaron al stock</td>             
                                        <td>{{ $historial->proveedor->nombre_proveedor}}</td>               
                                        
                                    @else
                                        <td>Se vendieron {{ $historial->cantidad }} producto(s) y se eliminaron del stock</td>
                                        <td>{{ $historial->cliente->nombre_cliente }}</td>
                                    @endif
                        
                                    <td>{{ $historial->cantidad }}</td>
                                    </tbody>
                        
                                    @endforeach
                                
                        </table>

                        <div class="pagination justify-content-end">
                            {!! $historials->links() !!}
                        </div>
                        
                            </div>
                        
                        
                        </div>
                        
                        
                        </body> 
                        
                        <script> 
                            function EliminarRegistro(value){ 
                                action = confirm(value) ? true: event.preventDefault() 
                             



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
@endsection