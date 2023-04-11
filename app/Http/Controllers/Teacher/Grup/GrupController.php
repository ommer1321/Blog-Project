<?php

namespace App\Http\Controllers\Teacher\Grup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GrupController extends Controller
{
    public function index()
    {
    return view('grup.index');    
    }

    public function create()
    {
    return view('grup.create');    
    }
}
