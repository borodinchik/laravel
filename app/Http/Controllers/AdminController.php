<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Question $question)
    {
      $question = $question->all();
        return view('admin', compact('$question'));
    }
}
