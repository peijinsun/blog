<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cheaps;
use App\Discounts;

class CheapsController extends Controller
{
    protected $recomends;
    protected $populars;
    public function __construct() 
    {
        // Fetch the Site Settings object
        $this->recomends = Discounts::where('is-rec', '=', '1')->orderBy('time', 'desc')->take(4)->get()->toArray();
        $this->populars = Discounts::orderBy('clicks', 'desc')->take(4)->get()->toArray();
        \View::share('recomends', $this->recomends);
        \View::share('populars', $this->populars);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cheaps = Cheaps::orderBy('time', 'desc')->paginate(9);
        return view('cheaps',['cheaps' => $cheaps,]);
    }
}
