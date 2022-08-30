<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Historial;
use App\Models\Proveedor;

class ProductoController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-prod|crear-prod|editar-prod|borrar-prod')->only('index');
        $this->middleware('permission:crear-prod')->only('create, store');
        $this->middleware('permission:editar-prod')->only('edit, update');
        $this->middleware('permission:borrar-prod')->only('destroy');
    }
    
    public function index()
    {
        $productos=Producto::paginate(6);
        return view('productos.index',compact('productos'));
    }

   
    public function create() 
    {   
        $categorias=Categoria::pluck('nombre','id')->all();       
        return view('productos.crear',compact('categorias'));
    }

   
    public function store(Request $request)
    {
        request()->validate([
            'nombre_prod'=>'required',
            'codigo_prod'=>'required',
            'categoria_id'=>'required'
        ]);

        Producto::create($request->all());
        return redirect()->route('productos.index');
    }

   
    public function show($id)
    {
        $clientes = Cliente::find($id);
        $proveedors = Proveedor::find($id);
        $producto = Producto::find($id); 

        $historials = Historial::where('producto_id', $producto->id)->get();

        $historials=Historial::paginate(5);

        return view('productos.mostrar', compact('producto', 'proveedors', 'clientes', 'historials'));  
    }

   
    public function edit(Producto $producto)
    {
        $categorias=Categoria::pluck('nombre','id')->all();    
        return view('productos.editar',compact('producto','categorias'));
    }

    
    public function update(Request $request, Producto $producto)
    {
        request()->validate([
            'nombre_prod'=>'required',
            'codigo_prod'=>'required',
            'categoria_id'=>'required'
        ]);
        
        $producto->update($request->all());
        return redirect()->route('productos.index');
    }

   
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }

    //----------------------------COMPRA------------------------------//
    public function compra (Producto $producto, $id) {
    
        $historials=Historial::all();  
        $proveedors=Proveedor::all();
        $producto = Producto::find($id); 
       
        return view('productos.compra',
               compact(['historials','proveedors','producto'])); 
        }

        public function guardar_compra(Request $request, $id){

            $request->validate([
                'stock' => 'required|numeric|between:0,99999999.99'
            ]);
    
                $historial = new Historial(); 
                $historial->producto_id = $request->producto_id; 
                $historial->fecha = $request->fecha; 
                $historial->proveedor_id = $request->proveedor_id; 
                $historial->cliente_id = null;
                $historial->referencia = $request->referencia; 
                $historial->cantidad = $request->cantidad; 
                $historial->save(); 
    
            $update = [ 
                'stock_prod' =>$request->cantidad + $request->stock,
        ]; 

            $producto = Producto::where('id', $id)->update($update); 
            return redirect()->action([ProductoController::class, 'index']); 
    }

//----------------------------VENTA------------------------------//
    public function venta (Producto $producto, $id) {
  
        $historials=Historial::all();
        $clientes=Cliente::all();
        $producto = Producto::find($id); 
            
        return view('productos.venta',
                compact(['producto', 'clientes', 'historials'])); 
        
        }    

        public function guardar_venta(Request $request, $id){

            $cant_max=Producto::where('id',$id)->get();
            //return 'Cantidad maxima '.$cant_max[0]->stock_prod;
           //dd($cant_max[0]->stock_prod);
            
           $this->validate($request,[
                'cantidad' => 'required|numeric|min:1|max:'.$cant_max[0]->stock_prod,
            ],[
                'cantidad.max'=>'La cantidad debe ser menor que '.$cant_max[0]->stock_prod,
                'cantidad.min'=>'La cantidad debe ser mayor que 0'             
            ]);


            $historial = new Historial(); 
            $historial->producto_id = $request->producto_id; 
            $historial->fecha = $request->fecha; 
            $historial->proveedor_id = null; 
            $historial->cliente_id = $request->cliente_id; 
            $historial->referencia = $request->referencia; 
            $historial->cantidad = $request->cantidad; 
            $historial->save();
    
            $update = [ 
                'stock_prod' =>$request->stock - $request->cantidad,
        ]; 
    
                $producto = Producto::where('id', $id)->update($update); 
                return redirect()->action([ProductoController::class, 'index']); 
        }

}