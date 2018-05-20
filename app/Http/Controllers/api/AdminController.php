<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 15/05/2018
 * Time: 10:56
 */

namespace App\Http\Controllers\api;


use App\Http\Controllers\Controller;
use App\Http\Mensagem;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $mensagens = [];
        $tipo = $request->input('tipo');

        if (is_null($tipo) || !is_string($tipo) || $tipo==0) {
            $mensagens = Mensagem::orderBy('created_at', 'desc')->get();
        } else {
            $mensagens = Mensagem::where('tipo_noticia_id', $request->input('tipo'))->orderBy('created_at', 'desc')->get();
        }

        $array_msg = [];

        foreach ($mensagens as $msg) {
            $array_msg[] = ['path' => $msg->tipoNoticia->path_black, 'titulo' => $msg->titulo, 'informacao' => $msg->informacao, 'tipo' => $msg->tipo_noticia_id,
                'updated_at' => $msg->updated_at->format('d/m/Y H:i'), 'id'=>$msg->id, 'visivel' =>$msg->visivel, 'imagem' => $msg->file,'visivelBonito' => $msg->visivel == 1 ? 'Visivel' : 'Oculto'];
        }


        return $array_msg;
    }
}   