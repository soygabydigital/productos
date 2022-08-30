<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-prov|crear-prov|editar-prov|borrar-prov')->only('index');
        $this->middleware('permission:crear-prov')->only('create, store');
        $this->middleware('permission:editar-prov')->only('edit, update');
        $this->middleware('permission:borrar-prov')->only('destroy');
    }
   
    public function index()
    {
        $proveedores=Proveedor::paginate(5);
        return view('proveedores.index',compact('proveedores'));
    }

   
    public function create()
    {
        return view('proveedores.crear');
    }

    
    public function store(Request $request)
    {
        request()->validate([
            'dni_proveedor'=>'required',
            'nombre_proveedor'=>'required',
            'direccion_proveedor'=>'required',
            'telefono_proveedor'=>'required',
            'correo_proveedor'=>'required'
        ]);

        Proveedor::create($request->all());
        return redirect()->route('proveedors.index');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.editar',compact('proveedor'));
    }

   
    public function update(Request $request, Proveedor $proveedor)
    {
        request()->validate([
            'dni_proveedor'=>'required',
            'nombre_proveedor'=>'required',
            'direccion_proveedor'=>'required',
            'telefono_proveedor'=>'required',
            'correo_proveedor'=>'required'
        ]);
        
        $proveedor->update($request->all());
        return redirect()->route('proveedors.index');
    }

   
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedors.index');
    }
}
