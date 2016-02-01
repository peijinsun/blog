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
    protected $populars;
    public function __construct() 
    {
        // Fetch the Site Settings object
        $this->recomends = Discounts::where('is-rec', '=', '1')->orderBy('time', 'desc')->take(4)->get()->toArray();
        $this->populars = Discounts::orderBy('clicks', 'desc')->take(4)->get()->toArray();
        \View::share('recomends', $this->recomends);
        \View::share('populars', $this->populars);
    }
    public function index()
    {
        
        $discounts = Discounts::orderBy('time', 'desc')->paginate(10);
        if (Request::ajax()) {
            return \Response::json(\View::make('discounts.list', array('discounts' => $discounts))->render());
        }
        return view('home',['discounts' => $discounts,]);
    }

    public function dome() {
        $discounts = Discounts::where('type', '=', '0')->orderBy('time', 'desc')->paginate(10);
        if (Request::ajax()) {
            return \Response::json(\View::make('discounts.list', array('discounts' => $discounts))->render());
        }
        return view('home',['discounts' => $discounts]);
    }

    public function frgn() {
        $discounts = Discounts::where('type', '=', '1')->orderBy('time', 'desc')->paginate(10);
        if (Request::ajax()) {
            return \Response::json(\View::make('discounts.list', array('discounts' => $discounts))->render());
        }
        return view('home',['discounts' => $discounts]);
    }

    public function article() {
        $id = Request::input('id');
        $article = Discounts::find($id);
        $article->clicks ++;
        $article->save();
        $details = $article->toArray();
        return view('article', ['details' => $details]);
    }

    public function worth(Request $request) {
        if (Request::ajax()) {
            $id = Request::input('postId');
            $value = Request::input('value');
            $vote = Discounts::where('id', '=', $id)->first();
            $vote->update(['worths' => $value]);
            return response()->json(['status' => 'success',
            'msg' => 'Vote has been added.']);
        }
    }

    public function discount_list() {
        if (Request::has('type'))
        {
            $type = Request::input('type');
            $discounts = Discounts::where('type', '=', $type)->orderBy('time', 'desc')->paginate(10);
            if (Request::ajax()) {
                return \Response::json(\View::make('discounts.list', array('discounts' => $discounts, 'type' => $type))->render());
            }
            return view('home',['discounts' => $discounts, 'type' => $type]);
        }
    }

    public function recommend() {
         $discounts = Discounts::where('is-rec', '=', '1')->orderBy('time', 'desc')->paginate(10);
        if (Request::ajax()) {
            return \Response::json(\View::make('discounts.rec_list', array('discounts' => $discounts))->render());
        }
        return view('recommends',['discounts' => $discounts]);
    }

    public function search() {
        $keyword = Request::input('keyword');
        $discounts = Discounts::where('title', 'LIKE', '%'.$keyword.'%')->orderBy('clicks', 'desc')->paginate(10);
        if (Request::ajax()) {
            return \Response::json(\View::make('discounts.rec_list', array('discounts' => $discounts))->render());
        }
        return view('recommends',['discounts' => $discounts]);
    }
}
