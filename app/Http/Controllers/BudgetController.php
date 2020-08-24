<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function getBudget($id){
        return view('budget');
    }
}
