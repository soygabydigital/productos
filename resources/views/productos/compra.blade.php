@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h4 class="page__heading">Comprar <strong>{{$producto->nombre_prod}}</strong></h4>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           
                            <div class="row" style="margin-left: 7%;">
                                <div class="col-4">
                                  <center>
                                    @php
                                         $foto = "images/$producto->codigo_prod.jpg"; 
                                         $caja="images/caja.jpg";
                                    @endphp
                                
                                    @if (file_exists($foto))
                                    {{--$foto--}}
                                    <img style="width: 90%; border-radius: 1em;" src={{url($foto)}} alt=""> 
                                        @else
                                    {{--$caja--}}
                                     <img style="width: 90%; border-radius: 1em;" src={{url($caja)}} alt="">    
                                     
                                  @endif     
                                </center>
                                </div>
                                
                                
                                <div class="col-6">
                                <form action="/guardar_compra/{{$producto->id}}" method="post">
                                @csrf @method('post')
                                
                                      <div class="row-4">
                                          <div class="col-12">
                                              <label>Fecha</label><br>
                                             <input class="form-control" type="date" name=fecha><br>
                                          </div><!--col-2-->
                                
                                          <div class="row">
                                              <div class="col-6">
                                                 <label>Cantidad</label> <br>
                                                <input type="decimal" class="form-control" name="cantidad"><br>
                                             </div>
                                             <div class="col-6">
                                                 <label>Referencia</label><br>
                                                 <input type="text" class="form-control" name="referencia"><br>
                                              </div>
                                          </div>
                                          
                                          <div class="col-12">
                                               <label>Proveedor</label><br>
                                                  <select name="proveedor_id" class="form-control">
                                                    <option>Seleccione</option>
                                                    @foreach ($proveedors as $proveedor)
                                                        <option value="{{$proveedor->id}}">{{$proveedor->dni_proveedor}} | {{$proveedor->nombre_proveedor}}</option>
                                                    @endforeach
                                                </select><br>
                                          </div>
                                
                                      </div><!--row-->
                                
                                        <input type="hidden" name="stock" value="{{ $producto->stock_prod }}">
                                        <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                
                                <input class="btn btn-primary" type="submit" value="Comprar"> 
                                </form>
                                
                                </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
@endsection