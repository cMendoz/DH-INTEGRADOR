<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.inicio.index');
    }

    public function buscar(Request $request){
      $busqueda = $request->all();

      $departamentos = [
          'depto1' => [
            'foto' => 'dept1.jpg',
            'nombre' => 'Depto1',
            'superficie' => '20',
            'camas' => 4,
            'precio' => 2000
          ],
          'depto2' => [
            'foto' => 'dept2.jpg',
            'nombre' => 'Depto2',
            'superficie' => '2870',
            'camas' => 67,
            'precio' => 76676
          ],
          'depto3' => [
            'foto' => 'dept3.jpg',
            'nombre' => 'Depto3',
            'superficie' => '2',
            'camas' => 8,
            'precio' => 5
          ],
          'depto4' => [
            'foto' => 'dept4.jpg',
            'nombre' => 'Depto4',
            'superficie' => '298977',
            'camas' => 2,
            'precio' => 9
          ],
      ];

      $script = '<script>mostrarResultadosBusqueda("'.$busqueda['buscar'].'");</script>';

      return view('pages.inicio.index', compact('departamentos', 'script'));
    }
}
