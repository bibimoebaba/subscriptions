<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Subscription;

class SubscriptionController extends Controller
{

    //Return all records
    public function index(){
        return(Subscription::all());
    }

    //Return a single record
    public function show($id){
        return(Subscription::findOrFail($id));
    }

    //Store record in database
    public function store(Request $request){
        $this->validate_request($request);
        Subscription::create($request->all());
    }

    //Update a single record
    public function update(Request $request, $id){
        $this->validate_request($request);
        $subscription = Subscription::findOrFail($id);
        $subscription->update($request->all());
        return(response()->json(['subscription', $subscription]));
    }

    //Delete a single record
    public function delete($id){
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
    }

    //Function to validate te request
    private function validate_request($request){
        $this->validate($request, [
            'name'          => 'required|min:1',
            'origin_name'   => 'required'
        ]);
    }
}
