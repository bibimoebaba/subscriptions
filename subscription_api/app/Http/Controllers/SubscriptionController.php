<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Subscription;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){
        return(\App\Subscription::all());
    }

    public function create(Request $request){
        Subscription::create($request->all());
    }
}
