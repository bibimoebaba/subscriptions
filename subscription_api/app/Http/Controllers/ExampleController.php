<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    //Return all records
    public function index(){

    }

    //Return a single record
    public function show($id){

    }

    //Store record in database
    public function store(Request $request){
        $this->validate_request($request);
    }

    //Update a single record
    public function update(Request $request, $id){
        $this->validate_request($request);
    }

    //Delete a single record
    public function delete($id){
        
    }

    //Function to validate te request
    private function validate_request(Request $request){
        $this->validate($request, [

        ]);
    }
}
