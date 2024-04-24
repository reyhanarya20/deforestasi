<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NtlController extends Controller
{
    public function index(){
        return view('dashboardNTL');
    }
    
}
