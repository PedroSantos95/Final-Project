<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 11/04/2018
 * Time: 12:33
 */

namespace App\Http\Controllers;


use App\Http\TempoIntermedio;

class TableController extends Controller
{

    public function index()
    {
        return TempoIntermedio::all();
    }

}