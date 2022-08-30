<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-cat|crear-cat|editar-cat|borrar-cat')->only('index');
        $this->middleware('permission:crear-cat')->only('create, store');
        $this->middleware('permission:editar-cat')->only('edit, update');
        $this->middleware('permission:borrar-cat')->only('destroy');
    }
    
    public function index()
    {
        $categorias=Categoria::paginate(6);
        return view('categorias.index',compact('categorias'));    
    }

    
    public function create()
    {
       return view('categorias.crear');
    }

    
    public function store(Request $request)
    {
        request()->validate([
            'nombre'=>'required',
            'descripcion'=>'required',
           
        ]);

        Categoria::create($request->all());
        return redirect()->route('categorias.index');
    }


    
    public function edit(Categoria $categoria)
    {
        return view('categorias.editar',compact('categoria'));
    }

   
    public function update(Request $request, Categoria $categoria)
    {
        request()->validate([
            'nombre'=>'required',
            'descripcion'=>'required',           
        ]);
        
        $categoria->update($request->all());
        return redirect()->route('categorias.index');
    }

    
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}
