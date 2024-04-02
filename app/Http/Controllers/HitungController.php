<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Http\Request;

class HitungController extends Controller
{
    public function index() {
        $kriterias = [];
        $alternatifs = [];
        $nilais = [];
        $hitung = [];
        $total = [];
        $vector = [];
        $terbobot = [];
        $rank = [];
        foreach (Kriteria::orderBy('id')->get() as $kriteria)
            $kriterias[$kriteria->id] = $kriteria;
        foreach (Alternatif::all() as $alternatif)
            $alternatifs[$alternatif->id] = $alternatif;
        foreach (Nilai::orderBy('id_alternatif')->orderBy('id_kriteria')->get() as $nilai)
            $nilais[$nilai->id_alternatif][$nilai->id_kriteria] = $nilai->nilai;

        
        $arr = [];
        foreach ($nilais as $key => $val) {
            foreach ($val as $k => $v) {
                $arr[$key][$k] = $v;
                
            }
        }
        foreach ($arr as $key => $val){
            foreach ($val as $i => $j){
                $hitung[$key][$i] = pow($j, $kriterias[$k]->bobot); 
            }
        }
        foreach ($hitung as $key => $val){
            $total[$key] = array_sum($val);
        }
        foreach ($total as $key => $val){
                $vector[$key] = $val /array_sum($total) ;
                // dd($val);
        }
        arsort($vector);

        // arsort($vektor);
        $no = 1;
        foreach($vector as $key => $val){
            $rank[$key] = $no++; 
        }
        // dd($rank);
        
        return view('hitung.index', compact('kriterias', 'alternatifs', 'nilais', 'vector', 'hitung', 'total', 'rank'));
    }
}
