<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\AccountSubscription as accsub;

class AccountSubscriptionController extends Controller
{
    /**
     * Return all records.
     * @return Json [description]
     */
    public function index(){
        return(accsub::all());
    }

    /**
     * Return a single record.
     * @param  Integer $id [description]
     * @return Json     [description]
     */
    public function show($id){
        return(accsub::findOrFail($id));
    }

    /**
     * Store a single record.
     * @param  Request $request [description]
     * @return Json             [description]
     */
    public function store(Request $request){
        $this->validate_request($request);
        accsub::create($request->all());
    }

    /**
     * Update a single record and returns it.
     * @param  Request $request [description]
     * @param  Integer  $id      [description]
     * @return Json           [description]
     */
    public function update(Request $request, $id){
        $this->validate_request($request);
        $record = accsub::findOrFail($id);
        $record->update($request->all());
        return(response()->json(['accountSubscription', $record]));
    }

    /**
     * Delete a single record
     * @param  Integer $id [description]
     * @return void
     */
    public function delete($id){
        $record = accSub::findOrFail($id);
        $record->delete();
    }

    /**
     * Validate incoming request.
     * @param  Request $request [description]
     * @return void
     */
    private function validate_request(Request $request){
        $this->validate($request, [
            'account_id'        => 'required',
            'subscription_id'   => 'required',
            'origin_name'       => 'required'
        ]);
    }
}
