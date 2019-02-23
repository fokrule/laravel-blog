<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class basicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "Home From Basic controller";
    }
    public function about()
    {
        return view('about');
    }
    public function info()
    {
        $info = "Here All info will show";
        return view('info')->with('showinfo',$info);
    }

}
