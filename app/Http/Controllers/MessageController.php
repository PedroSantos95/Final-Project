<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 19/04/2018
 * Time: 13:13
 */

namespace App\Http\Controllers;


use App\Http\Mensagem;
use App\Http\Rally;
use App\Http\TipoNoticia;
use Carbon\Carbon;
use App\Http\Controllers\api\RallyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MessageController extends Controller
{
    public function index($saved = 0)
    {
        $mensagens = Mensagem::orderBy('created_at','desc')->paginate(6);
        $tiposNoticia = TipoNoticia::all();
        $tamanhoImagem = env('IMAGE_SIZE','');
        $rally = session('rally');

        if(isset($_GET['saved'])){
            $saved = 1;
        }

        return view('message.admin', compact('mensagens', 'tiposNoticia', 'tamanhoImagem', 'saved', 'rally'));
    }

    public function showMensagens() //agr o problema e aqui ne?
    {
        $tiposNoticia = TipoNoticia::all();

        return view('news', compact('tiposNoticia'));
    }

    public function editarMensagem($id)
    {
        $mensagem = Mensagem::findOrFail($id);
        $tiposNoticia = TipoNoticia::all();

        return view('message/edit',compact('mensagem','tiposNoticia'));
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
        $mensagem = Mensagem::where('id', $id)->first();
        $mensagem->visivel = $mensagem->visivel ? false : true;
        $mensagem->update();
        return redirect()->route('adminBoard');
    }

    public function create(Request $request)
    {
        if(!$request['tipo'] || !$request['titulo'] || !$request['corpo']) {
            return view('message.admin', ['error' => 'Todos os campos têm que estar preenchidos']);
        }
        $mensagem = new Mensagem;
        $mensagem->visivel = true;
        $mensagem->id_rally = $request->session()->get('rally');
        $mensagem->titulo = $request['titulo'];
        $mensagem->tipo_noticia_id = $request['tipo'];
        $mensagem->informacao = $request['corpo'];
        if($request->file('image') != null){
            $mensagem->file = $request->file('image')->getClientOriginalName();

            $request->file('image')->move(
                base_path() . '/public/img/uploads/', $mensagem->file);
        }

        if($mensagem->save()){
            $saved = 1;
        }
        else{
            $saved = -1;
        }

        return $this->index($saved);
    }


}