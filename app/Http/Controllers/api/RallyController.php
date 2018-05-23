<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 23/05/2018
 * Time: 12:07
 */

namespace App\Http\Controllers;


use App\Http\Rally;

class RallyController extends Controller
{
    public static function all()
    {
        $rallys = Rally::all();

        return $rallys;
    }
}