<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\AccountSubscription as accsub;

class AccountSubscriptionController extends Controller
{
    /**
     * [index description]
     * @return [type] [description]
     */
    public function index(){
        return(accsub::all());
    }

    /**
     * [show description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function show($id){
        return(accsub::findOrFail($id));
    }

    /**
     * [store description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request){
        $this->validate_request($request);
        accsub::create($request->all());
    }

    /**
     * [update description]
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function update(Request $request, $id){
        $this->validate_request($request);
        $record = accsub::findOrFail($id);
        $record->update($request->all());
        return(response()->json(['accountSubscription', $record]));
    }

    /**
     * [delete description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id){
        $record = accSub::findOrFail($id);
        $record->delete();
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
            'origin_name'       => 'required'
        ]);
    }
}
