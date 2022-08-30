<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-cli|crear-cli|editar-cli|borrar-cli')->only('index');
        $this->middleware('permission:crear-cli')->only('create, store');
        $this->middleware('permission:editar-cli')->only('edit, update');
        $this->middleware('permission:borrar-cli')->only('destroy');
    }
    
    public function index()
    {
        $clientes=Cliente::paginate(5);
        return view('clientes.index',compact('clientes'));
    }

   
    public function create()
    {
        return view('clientes.crear');
    }

    
    public function store(Request $request)
    {
        request()->validate([
            'dni_cliente'=>'required',
            'nombre_cliente'=>'required',
            'direccion_cliente'=>'required',
            'telefono_cliente'=>'required',
            'correo_cliente'=>'required'
        ]);

        Cliente::create($request->all());
        return redirect()->route('clientes.index');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit(Cliente $cliente)
    {
        return view('clientes.editar',compact('cliente'));
    }

    
    public function update(Request $request, Cliente $cliente)
    {
        request()->validate([
            'dni_cliente'=>'required',
            'nombre_cliente'=>'required',
            'direccion_cliente'=>'required',
            'telefono_cliente'=>'required',
            'correo_cliente'=>'required'
        ]);
        
        $cliente->update($request->all());
        return redirect()->route('clientes.index');
    }

    
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
