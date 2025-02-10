<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CocheController extends Controller
{
    public function index () {
       $coches =[
        ["Mazda RX7","Mazda", 20000],
        ["Mercedes CLA", "Mercedes", 50000],
        ["Ford Mustang","Ford", 30000],
        ["Peugeot 307 MS", "Peugeot", 15000],
        ["Fiat Multipla", "Fiat", 16000],
        ["Citroën C15","Citroën", 17000],
        ["Mitsubichi Pajero","Mitsubichi",99999]
       ];

        return view('coches', ['coches' => $coches]);
    }
}
/*
CREAR UN CONTROLADOR MarcaController que contenga una 
lista de marcas y mostrarlas en la vista marcas.blade.php

MODIFICAR EL CONTROLADOR CocheController para que en 
vez de tener una lista de coches, sea una tabla con
 el modelo del coche, su marca y su precio */
