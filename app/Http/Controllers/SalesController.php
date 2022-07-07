<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\SalesDetails;
use DB;
use Carbon\Carbon;


class SalesController extends Controller
{
    
    public function index(Request $request){
        $vista="sales";
        return view('home.index')->with("vista",$vista);  
    }

    public function store(Request $request)
    {
        
        $messages = [
           'nombres.required'  => 'Nombres del cliente son obligatorios es requerido',
           'email.required'    => 'Email es requerido',
           'celular.required'  => 'Número de celular es requerido',
           'detalles.required' => 'La orden no tiene artículos',
         
         ];
    
        $validator = Validator::make($request->all(), [
            'nombres'         => 'required',
            'email'           => 'required',
            'celular'         => 'required',
            'detalles'        => 'required',
        ],$messages);

        if ($validator->fails()) {
            return view('orders.store')
                        ->withErrors($validator)
                        ->with("guardar",false);
        }
      
       \DB::beginTransaction();
        
       try{
                        
            $sales = new Sales;
            $fecha = date("Y-m-d H:m:i");
            $sales->cliente_nombre= $request->input('nombres');
            $sales->cliente_email = $request->input('email');
            $sales->cliente_mobile= $request->input('celular');
            $sales->estado        = 'Activo';
            $sales->valor         = $request->input('valor_input_orden');
            $sales->fecha         = $fecha;
           
            if(!$sales->save()){
                \DB::rollback();
               
                return view('sales.store')
                        ->with("guardar",false)
                        ->with("mensaje","Error al guardar la factura");

            }
               
            $detalles_item = str_replace("]\"","]",str_replace("\"[","[",str_replace("\\","",$request->input('detalles'))));
    
            if($detalles_item!=''){   
                if(json_decode($detalles_item)){
                    $detalles_item = json_decode($detalles_item);

                      foreach( $detalles_item as $items):
                        if($items->codigo!=''){
                            $detalles = new SalesDetails();   
                            $detalles->fac_id      = $sales->id;
                            $detalles->producto_id = $items->id;
                            $detalles->cantidad    = $items->cantidad;
                            $detalles->subtotal    = $items->subtotal;
                            $detalles->valor       = $items->valor;              

                            if(!$detalles->save()){
                                \DB::rollback();
                                return view('sales.store')
                                        ->with("guardar",false)
                                        ->with("mensaje","Error al adicionar los productos a la factura");
                            }
                       }
                    endforeach;

                }else{
                    \DB::rollback();
                    return view('sales.store')
                                ->with("guardar",false)
                                ->with("mensaje","Error al adicionar los productos a la factura");
            }
                
        }

        \DB::commit();

        $sql="update productos inner join factura_detalle on productos.id=factura_detalle.producto_id 
        set productos.stock=productos.stock-factura_detalle.cantidad
        where factura_detalle.fac_id='".$sales->id."'";

        $productos = DB::Select($sql);

        return view("sales.store")->with("guardar",true)
                                   ->with("mensaje","Factura guardada")
                                   ->with("fac_id",$sales->id);
                        
        }catch(ValidationException $e)
        {
            \DB::rollback();
            return view('sales.store')
                    ->with("guardar",false)
                    ->with("mensaje","Error al adicionar los productos a la factura");
        } catch(\Exception $e)
        {
            \DB::rollback();
            throw $e;
        }    
    }

 
    function listSales(){

        $sales = Sales::get();
        $vista ="listsales";

        return view('home.index', compact('sales','vista'));
    }

    function pdf($id){

        $factura = Sales::find($id);
        //$factura_detalle = SalesDetails::where("fac_id",$factura->id)->get();
        $factura_detalle = SalesDetails::join('productos as p', 'p.id', '=', 'producto_id')->get();

        $view =  \View::make('sales.pdf', compact('factura','factura_detalle'))
                                ->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream("sales.pdf");

    }

}


