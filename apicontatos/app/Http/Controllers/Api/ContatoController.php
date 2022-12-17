<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contato; //eu importei

class ContatoController extends Controller
{
    public function status(){
        return ['status' => 'ok'];
    }

    public function add(Request $request){
        
        try{
           $contato = new Contato();

           $contato->nome = $request->nome;
           $contato->telefone = $request->telefone;
           $contato->email = $request->email;

           $contato->save();

           return ['retorno'=>'ok'];

        } catch(\Exception $erro){
           
            return ['retorno'=>'erro', 'details'=>$erro];
        }
    }

    public function list(Request $request){

        $contato = Contato::all(); //aqui no parametro pode se dizer quais campos retornar;

        return $contato;
    }

    public function select($id){

        $contato = Contato::find($id);

        return $contato;
    }

    public function update(Request $request, $id){
        
        try{
           $contato = Contato::find($id);

           $contato->nome = $request->nome;
           $contato->telefone = $request->telefone;
           $contato->email = $request->email;

           $contato->save();

           return ['retorno'=>'ok', 'data'=>$request->all()]; //posso tirar o 'data'=>$request;

        } catch(\Exception $erro){
           
            return ['retorno'=>'erro', 'details'=>$erro];
        }
    }

    public function delete($id){
        
        try{
           $contato = Contato::find($id);

           $contato->delete();

           return ['retorno'=>'ok'];

        } catch(\Exception $erro){
           
            return ['retorno'=>'erro', 'details'=>$erro];
        }
    }

}
