<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Subscription;

class SubscriptionController extends Controller
{

    /**
     * [index description]
     * @return [type] [description]
     */
    public function index(){
        return(Subscription::all());
    }

    /**
     * [show description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function show($id){
        return(Subscription::findOrFail($id));
    }

    /**
     * [store description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request){
        $this->validate_request($request);
        Subscription::create($request->all());
    }

    /**
     * [update description]
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function update(Request $request, $id){
        $this->validate_request($request);
        $subscription = Subscription::findOrFail($id);
        $subscription->update($request->all());
        return(response()->json(['subscription', $subscription]));
    }

    /**
     * [delete description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id){
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
    }

    /**
     * [validate_request description]
     * @param  [type] $request [description]
     * @return [type]          [description]
     */
    private function validate_request($request){
        $this->validate($request, [
            'name'          => 'required|min:1',
            'origin_name'   => 'required'
        ]);
    }
}
