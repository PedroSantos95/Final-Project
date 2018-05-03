<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 30/04/2018
 * Time: 12:05
 */

namespace App\Http;

use Illuminate\Database\Eloquent\Model;

class TipoNoticia extends Model
{
    protected $table = 'tipos_noticia';
    public $timestamps = false;

    public function tipoNoticia(){
        return $this->hasMany('App\Http\Mensagem');
    }
}