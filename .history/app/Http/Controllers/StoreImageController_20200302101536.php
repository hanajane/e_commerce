<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Images;
use Illuminate\Support\Facades\Response;
use Image;
use Illuminate\Support\Facades\Storage;

class StoreImageController extends Controller
{
    function index()
    {
        return view('testImage');
        // $data = Images::latest()->paginate(5);
        //     return view('testImage', compact('data'))
        //         ->with('i', (request()->input('page', 1) -1) * 5);
    }
}
