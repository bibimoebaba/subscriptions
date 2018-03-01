<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;

class ProductController extends Controller
{
    /**
     * [index description]
     * @return [type] [description]
     */
    public function index(){
        return(Product::all());
    }

    /**
     * [show description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function show($id){
        return(Product::findOrFail($id));
    }

    /**
     * [store description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request){
        $this->validate_request($request);
        Product::create($request->all());
    }

    /**
     * [update description]
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function update(Request $request, $id){
        $this->validate_request($request);
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return(response()->json(['product', $product]));
    }

    /**
     * [delete description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id){
        $product = Product::findOrFail($id);
        $product->delete();
    }

    /**
     * [validate_request description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    private function validate_request(Request $request){
        $this->validate($request, [
            'name' => 'required|min:1'
        ]);
    }
}
