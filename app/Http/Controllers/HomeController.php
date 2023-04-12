<?php

namespace App\Http\Controllers;

use App\Traits\TaskTrait;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use TaskTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {$taskList = $this->listTask();
        return view('home.index',compact('taskList'));
    }
}
