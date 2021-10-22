<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Products;
use DB, Validator;

class ProductsCtrl extends Controller
{
    public function itemsAll(Products $products){
        $product = $products->all();
        return response()->json(['products' => $product], 200);
    }

    public function createItem(Products $product, Request $request){
        $validator = $this->_validatorItem($request);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        DB::beginTransaction();
        try {
            $itemCode = $this->generateRandomString();

            $product->itemName = $request->input('itemName');
            $product->itemCode = $itemCode;
            $product->newPrice = $request->input('newPrice');
            $product->oldPrice = $request->input('oldPrice', '');
            $product->size = $request->input('size', 0);
            $product->countItems = $request->input('countItems', '');
            $product->itemSex = $request->input('itemSex', '');
            $product->itemNote = $request->input('itemNote', '');
            $product->itemImage = $request->input('itemImage', '');
            $product->category_id = $request->input('category_id');
            $product->brand = $request->input('brand_id');
            $product->save();

            $productID = DB::getPdo()->lastInsertId();

            $this->_updateItem($product, $request, $itemCode, $productID);
            DB::commit();

            return response()->json(['Create product is successfully'], 200);
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(['errors' => "Can't create a new item"]);
        }

    }

    protected function _validatorItem($data) {
        $validator = Validator::make($data->all(), [
            'itemName' => 'required',
            'newPrice' => 'required',
            'countItems' => 'required',
            'category_id' => 'required',
        ], [
            'itemName.required' => 'Name item is required',
            'newPrice.required' => 'Price Item is required',
            'countItems.required' => 'Count Item is required',
            'category_id.required' => 'Category ID is required'
        ]);

        return $validator;
    }

    public function _updateItem($product, $request, $itemCode, $productID){
        $products = $product->find($productID);
        $products->itemName = $request->input('itemName');
        $products->itemCode = $itemCode.$productID;
        $products->newPrice = $request->input('newPrice');
        $products->oldPrice = $request->input('oldPrice', '');
        $products->size = $request->input('size', 0);
        $products->countItems = $request->input('countItems', '');
        $products->category = $request->input('category', '');
        $products->brand = $request->input('brand', '');
        $products->itemSex = $request->input('itemSex', '');
        $products->itemNote = $request->input('itemNote', '');
        $products->itemImage = $request->input('itemImage', '');
        $products->save();
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return 'TK' . $randomString;
    }
}
