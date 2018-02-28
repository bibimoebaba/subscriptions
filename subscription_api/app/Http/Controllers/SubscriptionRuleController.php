<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\SubscriptionRule;

class SubscriptionRuleController extends Controller
{
    //Return all records
    public function index(){
        return(SubscriptionRule::all());
    }

    //Return a single record
    public function show($id){
        return(SubscriptionRule::findOrFail($id));
    }

    //Store record in database
    public function store(Request $request){
        $this->validate_request($request);
        SubscriptionRule::create($request->all());
    }

    //Update a single record
    public function update(Request $request, $id){
        $this->validate_request($request);
        $subscriptionRule = SubscriptionRule::findOrFail($id);
        $subscriptionRule->update($request->all());
        return(response()->json(['SubscriptionRule', $subscriptionRule]));
    }

    //Delete a single record
    public function delete($id){
        $subscriptionRule = SubscriptionRule::findOrFail($id);
        $subscriptionRule->delete();
    }

    //Function to validate te request
    private function validate_request(Request $request){
        $this->validate($request, [
            'subscription_id'   => 'required',
            'product_id'        => 'required',
            'price'             => 'required',
            'quantity'          => 'required',
            'time_period'       => 'required',
            'priority'          => 'required'
        ]);
    }
}
