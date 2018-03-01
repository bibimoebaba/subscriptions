<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\SubscriptionExceptionRule as ser;

class SubscriptionExceptionRuleController extends Controller
{
    /**
     * [index description]
     * @return [type] [description]
     */
    public function index(){
        return(ser::all());
    }

    /**
     * [show description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function show($id){
        return(ser::findOrFail($id));
    }

    /**
     * [store description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request){
        $this->validate_request($request);
        ser::create($request->all());
    }

    /**
     * [update description]
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function update(Request $request, $id){
        $this->validate_request($request);
        $ser = ser::findOrFail($id);
        $ser->update($request->all());
        return(response()->json(['subscriptionExceptionRule', $ser]));
    }

    /**
     * [delete description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id){
        $ser = ser::findOrFail($id);
        $ser->delete();
    }

    /**
     * [validate_request description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    private function validate_request(Request $request){
        $this->validate($request, [
            'account_id'        => 'required',
            'subscription_id'   => 'required',
            'product_id'        => 'required',
            'price'             => 'required',
            'quantity'          => 'required',
            'time_period'       => 'required',
            'priority'          => 'required'
        ]);
    }
}
