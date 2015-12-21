<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Discover;

class DiscoverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discovers = Discover::orderBy('time', 'desc')->paginate(4);
        // if (Request::ajax()) {
        //     return \Response::json(\View::make('discounts.list', array('discounts' => $discounts))->render());
        // }
        return view('discovers',['discovers' => $discovers,]);
    }

}
