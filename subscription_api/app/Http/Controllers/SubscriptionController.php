<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Subscription;

class SubscriptionController extends Controller
{
    public function index(){
        return(Subscription::all());
    }

    public function show($id){
        return(Subscription::findOrFail($id));
    }

    public function store(Request $request){
        $this->validate_request($request);
        Subscription::create($request->all());
    }

    public function update(Request $request, $id){
        $this->validate_request($request);
        $subscription = Subscription::findOrFail($id);
        $subscription->update($request->all());
        return response()->json(['subscription', $subscription]);
    }

    public function delete($id){
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
        return(true);
    }

    private function validate_request($request){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'origin_name' => 'required'
        ]);
    }
}
