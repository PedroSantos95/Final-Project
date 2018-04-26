<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 19/04/2018
 * Time: 13:13
 */

namespace App\Http\Controllers;


use App\Http\Mensagem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $mensagens = Mensagem::orderBy('created_at','desc')->get();

        return view('message.admin', compact('mensagens'));
    }

    public function showMensagens()
    {
        $mensagens = Mensagem::orderBy('created_at','desc')->get();
        return view('news', compact('mensagens'));
    }


    public function eliminarMensagem($id)
    {
        $mensagem = Mensagem::where('id', $id)->first();
        $mensagem->delete();

        return redirect()->route('adminBoard');
    }

    public function alterarEstadoMensagem($id)
    {

        //$mensagem = Mensagem::findOrFail($id);
        $mensagem = Mensagem::where('id', $id)->first();
        $mensagem->visivel = $mensagem->visivel ? false : true;
        $mensagem->save();
        return redirect()->route('adminBoard');
    }

    public function create(Request $request)
    {
        if(!$request['tipo'] || !$request['titulo'] || !$request['corpo']){
            return view('message.admin', ['error' => 'Todos os campos têm que estar preenchidos']);
        }

        $mensagem = new Mensagem;
        $mensagem->visivel = false;
        $mensagem->tipo_noticia = $request['tipo'];
        $mensagem->titulo = $request['titulo'];
        $mensagem->informacao = $request['corpo'];
/*
        switch ($mensagem->tipo_noticia){
            case 'noticias':
                $mensagem->path = 'news.png';
                break;
            case 'informacoes':
                $mensagem->path = 'info.png';
                break;
            case 'tempos':
                $mensagem->path = 'time.png';
                break;
            case 'acidentes':
                $mensagem->path = 'crash.png';
                break;
        }
*/
        $mensagem->save();

//        return view('message.admin', ['error' => '']);
        return redirect()->action('MessageController@index');
    }


}