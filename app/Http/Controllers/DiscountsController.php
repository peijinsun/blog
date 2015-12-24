<?php

namespace App\Http\Controllers;

use Request;
use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Discounts;

class DiscountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $recomends;
    protected $domestics;
    protected $foreigns;
    public function __construct() 
    {
        // Fetch the Site Settings object
        $this->recomends = Discounts::where('is-rec', '=', '1')->orderBy('time', 'desc')->take(4)->get()->toArray();
        $this->domestics = Discounts::where('type', '=', '0')->orderBy('time', 'desc')->take(4)->get()->toArray();
        $this->foreigns = Discounts::where('type', '=', '1')->orderBy('time', 'desc')->take(4)->get()->toArray();
        \View::share('recomends', $this->recomends);
        \View::share('domestics', $this->domestics);
        \View::share('foreigns', $this->foreigns);
    }
    public function index()
    {
        
        $discounts = Discounts::orderBy('time', 'desc')->paginate(10);
        if (Request::ajax()) {
            return \Response::json(\View::make('discounts.list', array('discounts' => $discounts))->render());
        }
        return view('index',['discounts' => $discounts,]);
    }

    public function article() {
        $id = Request::input('id');
        $details = Discounts::find($id)->toArray();
        return view('article', ['details' => $details]);
    }

    public function discount_list() {
        if (Request::has('type'))
        {
            $type = Request::input('type');
            $discounts = Discounts::where('type', '=', $type)->orderBy('time', 'desc')->paginate(10);
            if (Request::ajax()) {
                return \Response::json(\View::make('discounts.list', array('discounts' => $discounts, 'type' => $type))->render());
            }
            return view('types',['discounts' => $discounts, 'type' => $type]);
        }
    }

    public function recommend() {
         $discounts = Discounts::where('is-rec', '=', '1')->orderBy('time', 'desc')->paginate(5);
        if (Request::ajax()) {
            return \Response::json(\View::make('discounts.rec_list', array('discounts' => $discounts))->render());
        }
        return view('recs',['discounts' => $discounts]);
    }
}
