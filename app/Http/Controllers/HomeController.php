<?php

namespace STMIKPLK\Http\Controllers;

use Illuminate\Http\Request;
use STMIKPLK\Http\Requests;
use STMIKPLK\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("home.index")
            ->with('layout', $this->getLayout());
    }
}
