<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;

class ProductController extends Controller
{
    /**
     * Return all records.
     * @return Json [description]
     */
    public function index(){
        return(Product::all());
    }

    /**
     * Return a single record.
     * @param  Integer $id [description]
     * @return Json     [description]
     */
    public function show($id){
        return(Product::findOrFail($id));
    }

    /**
     * Store a single record.
     * @param  Request $request [description]
     * @return Json             [description]
     */
    public function store(Request $request){
        $this->validate_request($request);
        Product::create($request->all());
    }

    /**
     * Update a single record and returns it.
     * @param  Request $request [description]
     * @param  Integer  $id      [description]
     * @return Json           [description]
     */
    public function update(Request $request, $id){
        $this->validate_request($request);
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return(response()->json(['product', $product]));
    }

    /**
     * Delete a single record
     * @param  Integer $id [description]
     * @return void
     */
    public function delete($id){
        $product = Product::findOrFail($id);
        $product->delete();
    }

    /**
     * Validate incoming request.
     * @param  Request $request [description]
     * @return void
     */
    private function validate_request(Request $request){
        $this->validate($request, [
            'name' => 'required|min:1'
        ]);
    }
}
