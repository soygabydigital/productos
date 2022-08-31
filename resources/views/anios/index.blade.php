@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Activar Periodo Escolar {{ $anio_activo->numero }}</h3> 
        </div>
        <div class="section-body">
            <div class="row">
               
                    <div class="card">
                        <div class="card-body justify-content-center">                               
                                    
                                <div class="card"> 
                                    <div class="{{$formato}}" role="alert">{{$mensaje}}</div>				
                                        <div class="row w-100">
                                
                                                @foreach ($anios as $anio)
                                                @if ($anio->id!=1)	
                                                @php
                                                $texto="text-secondary";		
                                                @endphp
                                                        
                                                @if ($anio->numero==$anio_activo->numero)
                                                @php
                                                $texto="text-primary";	
                                                @endphp
                                                
                                                @endif
                                                    <div class="col-sm-2"> <!-- col-md-2-->
                                                        <div class="card border-info mx-sm-1 p-1">
                                                            <div class="card border-info {{$texto}} p-1" ><span class="text-center fa fa-calendar" aria-hidden="true"></span></div>
                                                            <div class="{{$texto}} text-center mt-2">{{$anio->numero}}</div>                                
                                                              
                                                            {!! Form::model($anio,['method'=>'PUT','route'=>['anios.update',$anio->id]]) !!}
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <button type="submit" class="btn btn-light" style="font-size:70%;">
                                                                 <img src="/img/toggle-on.svg" alt="Activar" width="80%" height="80%">   
                                                                </button>
                                                            </div>
                                                          
                                                             {!! Form::close() !!}

                                                                @if ($anio->numero==$anio_activo->numero)
                                                                <!--<div class="text-danger text-center mt-2">
                                                                    Activo
                                                                </div>	-->
                                                                @endif							
                                                        </div>
                                                    </div>	
                                                    
                                                @endif		
                                                @endforeach		
                                                                
                                            </div>                                      
                                    </div>                        
                    </div>
                </div>
            
        </div>
    </section>
@endsection
