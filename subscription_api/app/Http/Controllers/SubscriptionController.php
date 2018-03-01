<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Subscription;

class SubscriptionController extends Controller
{

    /**
     * Return all records.
     * @return Json [description]
     */
    public function index(){
        return(Subscription::all());
    }

    /**
     * Return a single record.
     * @param  Integer $id [description]
     * @return Json     [description]
     */
    public function show($id){
        return(Subscription::findOrFail($id));
    }

    /**
     * Store a single record.
     * @param  Request $request [description]
     * @return Json             [description]
     */
    public function store(Request $request){
        $this->validate_request($request);
        Subscription::create($request->all());
    }

    /**
     * Update a single record and returns it.
     * @param  Request $request [description]
     * @param  Integer  $id      [description]
     * @return Json           [description]
     */
    public function update(Request $request, $id){
        $this->validate_request($request);
        $subscription = Subscription::findOrFail($id);
        $subscription->update($request->all());
        return(response()->json(['subscription', $subscription]));
    }

    /**
     * Delete a single record
     * @param  Integer $id [description]
     * @return void
     */
    public function delete($id){
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
    }

    /**
     * Validate incoming request.
     * @param  Request $request [description]
     * @return void
     */
    private function validate_request($request){
        $this->validate($request, [
            'name'          => 'required|min:1',
            'origin_name'   => 'required'
        ]);
    }
}
