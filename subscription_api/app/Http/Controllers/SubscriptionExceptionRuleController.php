<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\SubscriptionExceptionRule as ser;

class SubscriptionExceptionRuleController extends Controller
{
    //Return all records
    public function index(){
        return(ser::all());
    }

    //Return a single record
    public function show($id){
        return(ser::findOrFail($id));
    }

    //Store record in database
    public function store(Request $request){
        $this->validate_request($request);
        ser::create($request->all());
    }

    //Update a single record
    public function update(Request $request, $id){
        $this->validate_request($request);
        $ser = ser::findOrFail($id);
        $ser->update($request->all());
        return(response()->json(['subscriptionExceptionRule', $ser]));
    }

    //Delete a single record
    public function delete($id){
        $ser = ser::findOrFail($id);
        $ser->delete();
    }

    //Function to validate te request
    private function validate_request(Request $request){
        $this->validate($request, [
            'account_id' => 'required',
            'subscription_id' => 'required',
            'product_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'time_period' => 'required',
            'priority' => 'required'
        ]);
    }
}
