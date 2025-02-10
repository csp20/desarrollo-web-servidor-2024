<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index () {
       $marcas =[
        "Fiat","Mazda", "mini", "seat", "ateca",
       ];

        return view('Marcas', ['Marcas' => $marcas]);
    }
}
?>