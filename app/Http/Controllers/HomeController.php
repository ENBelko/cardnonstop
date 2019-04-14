<?php

namespace App\Http\Controllers;

use App\Tariff;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        return view('home');
    }

    public function tariffs()
    {
        return view('tariffs');
    }

    public function getTariff(Request $request, Response $response)
    {
        if ($request->get('id') == 't1') {
            $tariff = Tariff::where('name', 'минимальный')->first()->name;
        } else {
            $tariff = Tariff::where('name', 'стандартный')->first()->name;
        }

        return $response->setContent(['success' => 'Вы выбрали тариф ' . $tariff]);
    }
}
