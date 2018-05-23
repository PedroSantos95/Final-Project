<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 23/05/2018
 * Time: 12:05
 */

namespace App\Http;


use Illuminate\Database\Eloquent\Model;

class Rally extends Model
{
    protected $table = 'rallys';
    public $timestamps = false;
}