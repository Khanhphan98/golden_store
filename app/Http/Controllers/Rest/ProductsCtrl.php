<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Products;
use DB, Validator;
use App\Model\Brand;


class ProductsCtrl extends Controller
{
    public function itemsAll(Products $products, Request $request){
        $validator = Validator::make($request->all(), [
            'page' => 'required',
            'perPage' => 'required'
        ], [
            'page.required' => 'Page is required',
            'perPage.required' => 'Per page is required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $page = (int) $request->input('page', 1);
        $perPage = $request->input('perPage', 10);
        $keyword = $request->input('keyword' , '');

        $product = $products->fillterProduct()->paginate($perPage);
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
            $product->brand_id = $request->input('brand_id');
            $product->save();

            $productID = DB::getPdo()->lastInsertId();

            $this->_updateItem($product, $request, $itemCode, $productID);
            DB::commit();

            return response()->json(['Create product is successfully'], 200);
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(['errors' => $e], 422);
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
        $products->itemSex = $request->input('itemSex', '');
        $products->itemNote = $request->input('itemNote', '');
        $products->itemImage = $request->input('itemImage', '');
        $products->category_id = $request->input('category_id');
        $products->brand_id = $request->input('brand_id');
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
