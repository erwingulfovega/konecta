<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use DB;
use Carbon\Carbon;


class ProductsController extends Controller
{
    
    public function index(Request $request){
        $vista="products";
        return view('home.index',compact('vista'));  
    }

    public function store(Request $request){

        $messages = [
           'nombre.required'    => 'Nombre es requerido',
           'referencia.required'=> 'Referencia es requerida',
           'precio.required'    => 'Precio es requerido',
           'peso.required'      => 'Peso es requerido',
           'categorias.required'=> 'Categoría es requerido',
           'stock.required'     => 'Stock es requerido',
        ];
    
        $validator      = Validator::make($request->all(), [
            'nombre'     => 'required',
            'referencia' => 'required',
            'precio'     => 'required',
            'peso'       => 'required',
            'categorias' => 'required',
            'stock'      => 'required',
        ],$messages);

        if ($validator->fails()) {
            return view('products.store')
                        ->withErrors($validator)
                        ->with("guardar",false);
        }

        try {

            $cont=Products::where("nombre",$request->input('nombre'))->count();

            if($cont==0){

                $productos = new Products;
                $fecha=date('Y-m-d');
               
                $productos->nombre         = $request->input('nombre');
                $productos->referencia     = $request->input('referencia');
                $productos->precio         = $request->input('precio');
                $productos->peso           = $request->input('peso');
                $productos->categoria      = $request->input('categorias');
                $productos->stock          = $request->input('stock');
                $productos->fecha_creacion = $fecha;
                $productos->estado         = 'Activo';


            }else{

                return view('products.store')
                        ->with("guardar",false)
                        ->with("mensaje","Existe una producto con ese nombre!");

            }
           
            if(!$productos->save()){
                return view('products.store')
                        ->with("guardar",false)
                        ->with("mensaje","Error al guardar el producto!");
                  
            }

            return view('products.store')
                        ->with("guardar",true)
                        ->with("mensaje","Producto guardado!");

        }catch(\Exception $e){
            throw $e;
        }
        
    }

    public function update(Request $request){

        try{
            
            $id=$request->input("id");
            $productos=Products::find($id);

            $productos->nombre         = $request->input('nombre');
            $productos->referencia     = $request->input('referencia');
            $productos->precio         = $request->input('precio');
            $productos->peso           = $request->input('peso');
            $productos->categoria      = $request->input('categorias');
            $productos->stock          = $request->input('stock');
            $productos->fecha_creacion = $request->input('fecha_creacion');

            if(!$productos->save()){
                return view('products.store')
                        ->with("guardar",false)
                        ->with("mensaje","Error al actualizar el producto!");
            }

            return view('products.store')
                        ->with("guardar",true)
                        ->with("mensaje","Producto actualizado!");

        }catch(\Exception $e) {
            throw $e;   
        }

    }

    public function delete(Request $request){

        try{
            
            $id=$request->input("id");
            $productos=Products::find($id);

            if(!$productos->delete()){
                return view('products.store')
                        ->with("guardar",false)
                        ->with("mensaje","Error al eliminar el producto!");
            }

            return view('products.store')
                        ->with("guardar",true)
                        ->with("mensaje","Producto eliminado!");

        }catch(\Exception $e) {
            throw $e;   
        }

    }
  
    public function autocomplete(Request $request)
    {
      
        $term = strtoupper($request->input("term"));
        $sql = "SELECT id,nombre,referencia,cantidad,precio,stock from productos
        where (id like '%$term%' or codigo like upper('%$term%') or referencia like upper('%term%')) limit 5";
        $productos = DB::Select($sql);
        $response = array();

        foreach($productos as $filas){
               
            $response[] = array("id"               => $filas->id,
                                "codigo"           => $filas->codigo,
                                "label"            => $filas->codigo." ".utf8_encode($filas->descripcion),
                                "value"            => $filas->descripcion,
                                "descripcion"      => $filas->descripcion,
                                "valor_formateado" => number_format($filas->valor,0,'','.'),
                                "valor"            => $filas->valor,
                                "anulado"          => 'NO'
                               );
        }

        return json_encode($response);

    }

}