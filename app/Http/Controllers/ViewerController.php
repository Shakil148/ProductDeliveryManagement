<?php

namespace SGFL\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use SGFL\User;
use Image;

class ViewerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function viewer()
    { 
        return view('viewer.page');
    }
    public function accounts()
    { 
        return view('viewer.accounts');
    }
    public function factoryIncharge()
    { 
        return view('viewer.factoryIncharge');
    }


}
