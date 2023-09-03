<?php

namespace App\Http\Controllers;

use App\Models\archiveNot;
use App\Models\censorshipNot;
use App\Models\computerNot;
use App\Models\jibayaNot;
use App\Models\legalNot;
use Illuminate\Support\Facades\DB;

class HeadController extends Controller
{
    //

    public function nots()
    {
        //
        $archiveNot = DB::table('archive_nots')->get();
        $censorshipNot = DB::table('censorship_nots')->get();
        $computerNot = DB::table('computer_nots')->get();
        $jibayaNot = DB::table('jibaya_nots')->get();
        $legalNot = DB::table('legal_nots')->get();

        return view('dashboard', [
            'archiveNot' => $archiveNot,
            'computerNot' => $computerNot,
            'jibayaNot' => $jibayaNot,
            'legalNot' => $legalNot,
            'censorshipNot' => $censorshipNot
        ]);
    }

    public function nots1()
    {
        //
        $archiveNot = DB::table('archive_nots')->get();
        $censorshipNot = DB::table('censorship_nots')->get();
        $computerNot = DB::table('computer_nots')->get();
        $jibayaNot = DB::table('jibaya_nots')->get();
        $legalNot = DB::table('legal_nots')->get();

        return view('welcome', [
            'archiveNot' => $archiveNot,
            'computerNot' => $computerNot,
            'jibayaNot' => $jibayaNot,
            'legalNot' => $legalNot,
            'censorshipNot' => $censorshipNot
        ]);
    }

    // public function archive()
    // {
    //     //
    //     $archiveNot = archiveNot::all();
    //     return view('archive.table', compact('archiveNot'));
    // }
    // public function legal()
    // {
    //     //
    //     $legalNot = legalNot::all();
    //     return view('legal.table', compact('legalNot'));
    // }
    // public function computer()
    // {
    //     //
    //     $computerNot = computerNot::all();
    //     return view('computer.table', compact('computerNot'));
    // }
    // public function jibaya()
    // {
    //     //
    //     $jibayaNot = jibayaNot::all();
    //     return view('jibaya.table', compact('jibayaNot'));
    // }
    // public function censorship()
    // {
    //     //
    //     $censorshipNot = censorshipNot::all();
    //     return view('censorship.table', compact('censorshipNot'));
    // }
}