<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ApiSet;

class StoreController extends Controller
{
    public function get_kind_info(Request $request){

        $product_kind = $request->product_kind;

        if($product_kind == "fruit")
        {
            $result = ApiSet::getFruitList();
        }else
        {
            $result = ApiSet::getVegetableList();
        }
        
        return response()->json($result);
    }

    public function get_price_info(Request $request){

        $product_kind = $request->product_kind;
        $product_name = $request->product_name;

        if($product_kind == "fruit")
        {
            $result = ApiSet::getFruitPrice($product_name);
        }else
        {
            $result = ApiSet::getVegetablePrice($product_name);
        }

        return response()->json($result);
    }
}
