<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Mensagem;
use App\Http\Rally;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 30/04/2018
 * Time: 14:38
 */
class NewsController extends Controller
{
    public function index(Request $request)
    {
        $rally = Rally::where('id',$request->input('id'))->first();

        $mensagens = [];
        $tipo = $request->input('tipo');

        if(is_null($rally)){
            $rally = RallyController::rallyActive();
        }
        if (is_null($tipo) || !is_string($tipo) || $tipo==0) {
            $mensagens = Mensagem::where('id_rally', $rally->id)->orderBy('created_at', 'desc')->get();
        } else {
            $mensagens = Mensagem::where('id_rally', $rally->id)->where('tipo_noticia_id', $request->input('tipo'))->orderBy('created_at', 'desc')->get();
        }

        $array_msg = [];

        $last=1;
        foreach ($mensagens as $msg) {
            if($msg->visivel == true){
                $array_msg[] = ['path' => $msg->tipoNoticia->path_black, 'titulo' => $msg->titulo, 'informacao' => $msg->informacao,
                    'nome_tipo'=>$msg->tipoNoticia->nome ,'updated_at' => $msg->updated_at->format('d/m/Y H:i'), 'last' => $last];
            }
            $last = 0;
        }


        return $array_msg;
    }


}