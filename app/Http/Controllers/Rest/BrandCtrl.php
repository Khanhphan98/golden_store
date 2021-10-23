<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;
use Validator;
use DB;

class BrandCtrl extends Controller
{
    public function listBrand(Brand $brand) {
        $listBrand = $brand->all();
        return response()->json(['status' => true, 'listBrand' => $listBrand], 200);
    }

    public function createBrand(Brand $brand, Request $request) {
        $validator = Validator::make($request->all(), [
            'nameBrand' => 'required',
        ], [
            'nameBrand.required' => 'Brand name is required'
        ]);

        if ($validator->failed()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

//        DB::beginTransaction();
//        try {
            $brand->nameBrand = $request->input('nameBrand');
            $brand->status = $request->input('status', 0);
            $brand->notes = $request->input('notes');
            $brand->save();
            DB::commit();

            return response()->json(['status' => true], 200);
//        } catch (\Throwable $e) {
//            DB::rollback();
//            return response()->json(['errors' => "Can't create brand"], 422);
//        }
    }
}