<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class PeopleController extends Controller
{
    public function index() {
        return view('people.index');
    }
}
