<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\SubscriptionRule;

class SubscriptionRuleController extends Controller
{
    /**
     * Return all records.
     * @return Json [description]
     */
    public function index(){
        return(SubscriptionRule::all());
    }

    /**
     * Return a single record.
     * @param  Integer $id [description]
     * @return Json     [description]
     */
    public function show($id){
        return(SubscriptionRule::findOrFail($id));
    }

    /**
     * Store a single record.
     * @param  Request $request [description]
     * @return Json             [description]
     */
    public function store(Request $request){
        $this->validate_request($request);
        SubscriptionRule::create($request->all());
    }

    /**
     * Update a single record and returns it.
     * @param  Request $request [description]
     * @param  Integer  $id      [description]
     * @return Json           [description]
     */
    public function update(Request $request, $id){
        $this->validate_request($request);
        $subscriptionRule = SubscriptionRule::findOrFail($id);
        $subscriptionRule->update($request->all());
        return(response()->json(['SubscriptionRule', $subscriptionRule]));
    }

    /**
     * Delete a single record
     * @param  Integer $id [description]
     * @return void
     */
    public function delete($id){
        $subscriptionRule = SubscriptionRule::findOrFail($id);
        $subscriptionRule->delete();
    }

    /**
     * Validate incoming request.
     * @param  Request $request [description]
     * @return void
     */
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
