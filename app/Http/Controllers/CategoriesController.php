<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use DB;
use Carbon\Carbon;


class CategoriesController extends Controller
{
    
    public function index(Request $request){
       
    }
  
    public function store(Request $request){

        $messages = [
           'categoria.required'=> 'Campo categoría es requerido'
        ];
    
        $validator      = Validator::make($request->all(), [
            'categoria' => 'required',
        ],$messages);

        if ($validator->fails()) {
            return view('categories.store')
                        ->withErrors($validator)
                        ->with("guardar",false);
        }

        try {

            $cont=Categories::where("descripcion",$request->input('categoria'))->count();

            if($cont==0){

                $categoria = new Categories;
               
                $categoria->descripcion = $request->input('categoria');
                $categoria->estado      = 'Activo';

            }else{

                return view('categories.store')
                        ->with("guardar",false)
                        ->with("mensaje","Existe una categoría con ese nombre!");

            }
           
            if(!$categoria->save()){
                return view('categories.store')
                        ->with("guardar",false)
                        ->with("mensaje","Error al guardar la categoría!");
                  
            }

            return view('categories.store')
                        ->with("guardar",true)
                        ->with("mensaje","Categoría guardada!");

        }catch(\Exception $e){
            throw $e;
        }
        
    }

    public function update(Request $request){

        try{
            
            $id=$request->input("id");
            $categoria=Categories::find($id);

            $categoria->descripcion=$request->input("descripcion");

            if(!$categoria->save()){
                return view('categories.store')
                        ->with("guardar",false)
                        ->with("mensaje","Error al actualizar la categoría!");
            }

            return view('categories.store')
                        ->with("guardar",true)
                        ->with("mensaje","Categoría actualizada!");

        }catch(\Exception $e) {
            throw $e;   
        }

    }

    public function delete(Request $request){

        try{
            
            $id=$request->input("id");
            $categoria=Categories::find($id);

            if(!$categoria->delete()){
                return view('categories.store')
                        ->with("guardar",false)
                        ->with("mensaje","Error al eliminar la categoría!");
            }

            return view('categories.store')
                        ->with("guardar",true)
                        ->with("mensaje","Categoría eliminada!");

        }catch(\Exception $e) {
            throw $e;   
        }

    }

}