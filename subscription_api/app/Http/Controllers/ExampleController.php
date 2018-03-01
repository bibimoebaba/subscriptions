<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * [index description]
     * @return [type] [description]
     */
    public function index(){

    }

    /**
     * [show description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function show($id){

    }

    /**
     * [store description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request){
        $this->validate_request($request);
    }

    /**
     * [update description]
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function update(Request $request, $id){
        $this->validate_request($request);
    }

    /**
     * [delete description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id){
        
    }

    /**
     * [validate_request description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    private function validate_request(Request $request){
        $this->validate($request, [

        ]);
    }
}
