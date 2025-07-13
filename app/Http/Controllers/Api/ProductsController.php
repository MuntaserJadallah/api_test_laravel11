<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Resources\ProductsResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index(){
     $products = Products::all();
     if($products){
        return ProductsResource::collection($products);
     }else{
        return response()->json(['message' => 'no products available'],401);
     } 
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|integer',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'all fields required',
                'error' => $validator->messages(),
            ],422
            );
        }

        $product = Products::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return response()->json([
            'message' => 'product save successfully',
            'data'    => new ProductsResource($product),
        ],200
        );

    }
    public function show($id){

        $product = Products::query()->whereAll(['id'], 'LIKE', '%' . $id. '%')
            ->get();

        if($product){
            return ProductsResource::collection($product);
        }else{
            return response()->json(['message' => 'no product available by this number'],401);
        } 
    }

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|integer',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'all fields required',
                'error' => $validator->messages(),
            ],422
            );
        }
        
        // test response
        /*
        return response()->json([
            'message' => 'product',
            'data'    => $product,
            ],200
        );
        */

        $product=DB::table('Products')->where('id', $id)
        ->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        if($product){
            return response()->json([
                'message' => 'product updated',
                'data'    => $product,
                ],200
            );
        }else{
            return response()->json(['message' => 'no product available by this number'],401);
        } 
        
    }
    public function destroy($id){

        $product=DB::table('Products')->where('id', $id)
        ->delete();

        if($product){
            return response()->json([
                'message' => 'product deleted',
                'data'    => $product,
                ],200
            );
        }else{
            return response()->json(['message' => 'no product available by this number'],401);
        } 
    }

}
