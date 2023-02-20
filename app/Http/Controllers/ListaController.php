<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machine;
use Illuminate\Support\Facades\DB;

class ListaController 
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */
    // public function index()
    // {
    //     return view('lista');
    // }

    public function index()
    {
        //$machines = DB::select('SELECT id, name FROM machines');
        //dd($machines);


        $machines = Machine::all();
        //dd($machines);

          $rota = 'lista';
           // return view('home')->with('rota', $rota);
        

        return view('lista')->with('machines', $machines)->with('rota', $rota);;
    }

    public function show($id)
    {
        echo "<h1>Visualizar a máquina $id.</h1>";
    }

}
