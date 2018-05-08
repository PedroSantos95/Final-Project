<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 19/04/2018
 * Time: 13:13
 */

namespace App\Http\Controllers;


use App\Http\Mensagem;
use App\Http\TipoNoticia;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $mensagens = Mensagem::orderBy('created_at','desc')->paginate(6);
        $tiposNoticia = TipoNoticia::all();

        return view('message.admin', compact('mensagens'), compact('tiposNoticia'));
    }

    public function showMensagens()
    {
        $mensagens = Mensagem::orderBy('created_at','desc')->get();
        $tiposNoticia = TipoNoticia::all();

        return view('news', compact('mensagens'), compact('tiposNoticia'));
    }

    public function editarMensagem($id)
    {
        $mensagem = Mensagem::findOrFail($id);
        $tiposNoticia = TipoNoticia::all();

        return view('message/edit',compact('mensagem'), compact('tiposNoticia'));
    }

    public function guardarMensagem(Request $request, $id){

        $mensagem = Mensagem::findOrFail($id);
        $mensagem->titulo = $request->get('titulo');
        $mensagem->informacao = $request->get('corpo');
        $mensagem->tipo_noticia_id = $request->get('tipo');
        $mensagem->created_at = Carbon::now();
        $mensagem->save();

        return redirect()->route('adminBoard');

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

        $tipoNoticia = TipoNoticia::find($request['tipo']);

        $mensagem = new Mensagem;
        $mensagem->visivel = true;
        $mensagem->titulo = $request['titulo'];
        $mensagem->informacao = $request['corpo'];
        $mensagem->tipoNoticia()->associate($tipoNoticia);
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