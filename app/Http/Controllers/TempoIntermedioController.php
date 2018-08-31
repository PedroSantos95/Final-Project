<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 11/04/2018
 * Time: 12:33
 */

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\TempoIntermedio;
use App\Http\Pecs;
use DB;
use PhpParser\Node\Expr\Array_;

class TempoIntermedioController extends Controller
{

    public function semCarroRef()
    {
        $carroRef = DB::table('tempos_intermedios')->where('id_rally', 2)->first();
        $numeroTemposIntermedios = $this->numeroTempos($carroRef);
        $pecs = Pecs::all()->where('id_rally', 2)->get(['nome']);

        dd($pecs);

        return view('tempos', compact('numeroTemposIntermedios', 'carroRef'), compact('pecs'));
    }

    public function teste(){
        $tempos = TempoIntermedio::select(['numero_carro', 'tempoPartida', 'tempoIntermedio_1', 'tempoIntermedio_2',
            'tempoIntermedio_3', 'tempoIntermedio_4', 'tempoIntermedio_5', 'tempoIntermedio_6', 'tempoIntermedio_7',
            'tempoIntermedio_8', 'tempoIntermedio_9', 'tempoIntermedio_10', 'tempoChegada'])->where('id_rally', 2)->get();

        $carroRef = DB::table('tempos_intermedios')->where('id_rally', 2)->first();
        $numeroTemposIntermedios = $this->numeroTempos($carroRef);

        return response()->json(['tempos' => $tempos, 'numeroTemposIntermedios' => $numeroTemposIntermedios]);
    }

    public function numeroTempos($carroRef){
        $numeroTemposIntermedios = 1;
        if($carroRef->tempoIntermedio_10 != null){
            $numeroTemposIntermedios = 10;
            return $numeroTemposIntermedios;
        }
        else{
            if($carroRef->tempoIntermedio_9 != null){
                $numeroTemposIntermedios = 9;
                return $numeroTemposIntermedios;
            }else{
                if($carroRef->tempoIntermedio_8 != null){
                    $numeroTemposIntermedios = 8;
                    return $numeroTemposIntermedios;
                }
                else{
                    if($carroRef->tempoIntermedio_7 != null){
                        $numeroTemposIntermedios = 7;
                        return $numeroTemposIntermedios;
                    }
                    else{
                        if($carroRef->tempoIntermedio_6 != null){
                            $numeroTemposIntermedios = 6;
                            return $numeroTemposIntermedios;
                        }
                        else{
                            if($carroRef->tempoIntermedio_5 != null){
                                $numeroTemposIntermedios = 5;
                                return $numeroTemposIntermedios;
                            }
                            else{
                                if($carroRef->tempoIntermedio_4 != null){
                                    $numeroTemposIntermedios = 4;
                                    return $numeroTemposIntermedios;
                                }
                                else{
                                    if($carroRef->tempoIntermedio_3 != null){
                                        $numeroTemposIntermedios = 3;
                                        return $numeroTemposIntermedios;
                                    }
                                    else{
                                        if($carroRef->tempoIntermedio_2 != null){
                                            $numeroTemposIntermedios = 2;
                                            return $numeroTemposIntermedios;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return $numeroTemposIntermedios;
    }
}