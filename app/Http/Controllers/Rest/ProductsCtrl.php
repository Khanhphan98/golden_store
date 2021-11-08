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
            $product->itemImage = '';
            $product->category_id = $request->input('category_id');
            $product->brand_id = $request->input('brand_id');
            $product->status = $request->input('status', 0);
            $product->save();

            $productID = DB::getPdo()->lastInsertId();

            $this->_updateItem($product, $request, $itemCode, $productID);
            DB::commit();

            return response()->json(['status' => 'Tạo sản phẩm thành công'], 200);
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(['error' => $e], 422);
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
        $images = [];
        if ($request->hasFile('itemImage')) {
            foreach ($request->file('itemImage') as $value) {
                $name = $value->getClientOriginalName();
                $value->move('images', $name);
                array_push($images, $name);
            }
            $products->itemImage = json_decode(json_encode($images),true);
        } else {
            $products->itemImage = '';
        }
        $products->itemName = $request->input('itemName');
        $products->itemCode = $itemCode.$productID;
        $products->newPrice = $request->input('newPrice');
        $products->oldPrice = $request->input('oldPrice', '');
        $products->size = $request->input('size', 0);
        $products->countItems = $request->input('countItems', '');
        $products->itemSex = $request->input('itemSex', '');
        $products->itemNote = $request->input('itemNote', '');
        $products->category_id = $request->input('category_id');
        $products->brand_id = $request->input('brand_id');
        $product->status = $request->input('status', 0);
        $products->save();
    }

    public function deleteItem($idItem, Products $products){
        $item = $products->find($idItem);

        if (empty($item)) {
            return response()->redirect(['error' => 'Không tìm thấy sản phẩm'], 422);
        }

        DB::beginTransaction();
        try {
            $item->delete();
            DB::commit();
            return response()->json(['status' => 'Xoá sản phẩm thành công!'], 200);
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(['error' => "Không thể xoá được sản phẩm!"], 422);
        }
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

    private function replaceSymLink($path){
        if(
            strpos($path, '../') !== false OR
            strpos($path, './') !== false OR
            strpos($path, '.\\') !== false OR
            strpos($path, '.\\') !== false
        ){
            $path = realpath($path);
        }

        return $path;
    }

    public function listItems(Products $products) {
        $product = $products->all();

        $listItem = [];

        forEach($product as $key => $value) {
            $jsonImage = json_decode($value->itemImage, true);
            if (!empty($jsonImage)) {
                array_push($listItem, $jsonImage[0]);
            } else {
                array_push($listItem, '');
            }
            $value->itemImage = $listItem[$key];
        }


        return response()->json(['products' => $product], 200);
    }


}
