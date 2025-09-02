<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home');
    }

    public function consultarCnpj(): View
    {
        return view('pages.consultar-cnpj');
    }

    public function consultaAvancadaCnpj(): View
    {
        return view('pages.consulta-avancada-cnpj');
    }

    public function listSegmentadas(): View
    {
        return view('pages.listas-segmentadas');
    }
}
