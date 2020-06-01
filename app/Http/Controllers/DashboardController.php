<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    private $page_title = 'Dashboard';
    public function index()
    {

        $page_title = $this->page_title;
        return view('dashboard.index', compact('page_title'));
    }
}
