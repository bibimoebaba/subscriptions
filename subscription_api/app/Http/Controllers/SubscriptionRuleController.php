<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\SubscriptionRule;

class SubscriptionRuleController extends Controller
{
    /**
     * [index description]
     * @return [type] [description]
     */
    public function index(){
        return(SubscriptionRule::all());
    }

    /**
     * [show description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function show($id){
        return(SubscriptionRule::findOrFail($id));
    }

    /**
     * [store description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request){
        $this->validate_request($request);
        SubscriptionRule::create($request->all());
    }

    /**
     * [update description]
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function update(Request $request, $id){
        $this->validate_request($request);
        $subscriptionRule = SubscriptionRule::findOrFail($id);
        $subscriptionRule->update($request->all());
        return(response()->json(['SubscriptionRule', $subscriptionRule]));
    }

    /**
     * [delete description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id){
        $subscriptionRule = SubscriptionRule::findOrFail($id);
        $subscriptionRule->delete();
    }

    /**
     * [validate_request description]
     * @param  Request $request [description]
     * @return [type]           [description]
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
