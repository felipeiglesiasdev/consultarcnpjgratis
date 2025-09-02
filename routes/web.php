<?php
use App\Http\Controllers\PageController;

use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function () {
    // Rota para a página inicial ('/')
    Route::get('/', 'home')->name('home');

    // Rota para a página de Consultar CNPJ ('/consultar-cnpj')
    Route::get('/consultar-cnpj', 'consultarCnpj')->name('consultar-cnpj');

    // Rota para a página de Consulta Avançada CNPJ ('/consulta-avancada-cnpj')
    Route::get('/consulta-avancada-cnpj', 'consultaAvancadaCnpj')->name('consulta-avancada-cnpj');
    
    // Rota para a página de Listas Segmentadas ('/listas-segmentadas')
    Route::get('/listas-segmentadas', 'listSegmentadas')->name('listas-segmentadas');
});


