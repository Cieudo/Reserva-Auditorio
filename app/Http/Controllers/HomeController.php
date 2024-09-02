<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Exibe a tela inicial.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('inicial.index'); // Caminho para o arquivo Blade
    }
}
