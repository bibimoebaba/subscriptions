<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;

class ProductController extends Controller
{
    //Return all records
    public function index(){
        return(Product::all());
    }

    //Return a single record
    public function show($id){
        return(Product::findOrFail($id));
    }

    //Store record in database
    public function store(Request $request){
        $this->validate_request($request);
        Product::create($request->all());
    }

    //Update a single record
    public function update(Request $request, $id){
        $this->validate_request($request);
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return(response()->json(['product', $product]));
    }

    //Delete a single record
    public function delete($id){
        $product = Product::findOrFail($id);
        $product->delete();
    }

    //Function to validate te request
    private function validate_request(Request $request){
        $this->validate($request, [
            'name' => 'required|min:1'
        ]);
    }
}
