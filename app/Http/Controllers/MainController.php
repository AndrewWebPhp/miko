<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class MainController extends Controller
{
        
    /**
     * index
     *
     * @return void
     */
    public function index($city = null)
    {
        // dd($city);
        // dump($city);
        // dump(session()->all()); // Посмотрим, что есть в сессии
        // dump(request()->route()->parameters()); // Посмотрим параметры маршрута
        // dd();

        if(!$city && session('city_session')) {
            return redirect()->route('index', session('city_session.slug'), 302); // 'city' is the object because of firstOrFail()
        }

        if($city) {
            $city_data = City::where('slug', $city)->firstOrFail();
            session(['city_session' => $city_data]);
        }

        return view('main.index', [
            'cities' => City::all()
        ]);
    }
    
    /**
     * about
     *
     * @return void
     */
    public function about($city)
    {
        return view('main.about');
    }
    
    /**
     * news
     *
     * @return void
     */
    public function news($city)
    {
        return view('main.news');
    }


}
