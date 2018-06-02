<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 11/04/2018
 * Time: 12:33
 */

namespace App\Http\Controllers\api;


use App\Http\Controllers\Controller;
use App\Http\TempoIntermedio;

class TempoIntermedioController extends Controller
{

    public function index()
    {
        return TempoIntermedio::all();
    }

}