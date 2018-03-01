<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\AccountSubscription as accsub;

class AccountSubscriptionController extends Controller
{
    //Return all records
    public function index(){
        return(accsub::all());
    }

    //Return a single record
    public function show($id){
        return(accsub::findOrFail($id));
    }

    //Store record in database
    public function store(Request $request){
        $this->validate_request($request);
        accsub::create($request->all());
    }

    //Update a single record
    public function update(Request $request, $id){
        $this->validate_request($request);
        $record = accsub::findOrFail($id);
        $record->update($request->all());
        return(response()->json(['accountSubscription', $record]));
    }

    //Delete a single record
    public function delete($id){
        $record = accSub::findOrFail($id);
        $record->delete();
    }

    //Function to validate te request
    private function validate_request(Request $request){
        $this->validate($request, [
            'account_id'        => 'required',
            'subscription_id'   => 'required',
            'start_date'        => 'required',
            'origin_name'       => 'required'
        ]);
    }
}
