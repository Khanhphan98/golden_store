<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;
use Validator;
use DB;

class BrandCtrl extends Controller
{
    public function listBrand(Brand $brand, Request $request) {
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
        $perPage = (int) $request->input('perPage', 10);

        $page > 0 ? $listBrand = $brand->orderBy('created_at', 'asc')->paginate($perPage) : $listBrand = $brand->all();

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

        DB::beginTransaction();
        try {
            $brand->nameBrand = $request->input('nameBrand');
            $brand->status = $request->input('status', 0);
            $brand->notes = $request->input('notes');
            $brand->save();
            DB::commit();

            return response()->json(['status' => 'Tạo Thương hiệu thành công!'], 200);
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(['error' => "Can't create brand"], 422);
        }
    }

    public function updateBrand(Brand $brand, Request $request, $brandID) {
        $validator = Validator::make($request->all(), [
            'nameBrand' => 'required',
        ], [
            'nameBrand.required' => 'Brand name is required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        DB::beginTransaction();
        try {
            $brands = $brand->find($brandID);
            $brands->nameBrand = $request->input('nameBrand');
            $brands->status = $request->input('status', 0);
            $brands->notes = $request->input('notes');
            $brands->save();

            DB::commit();
            return response()->json(['status' => 'Cập nhật thương hiệu thành công!'], 200);
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(['error' => "Không thể cập nhật được thương hiệu!"], 422);
        }
    }

    public function deleteBrand(Brand $brand, $brandID){
        $brands = $brand->find($brandID);

        if (empty($brands)) {
            return response()->json(['status' => 'Thương hiệu này không tồn tại'], 422);
        }

        $brands = $brand->find($brandID)->products;
        if (count($brands) > 0) {
            return response()->json(['error' => "Thương hiệu này không thể xoá!"], 422);
        }

        DB::beginTransaction();
        try {
            $brandS = $brand->find($brandID);
            $brandS->delete();
            DB::commit();
            return response()->json(['status' => 'Thương hiệu đã xoá thành công!'], 200);
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(['error' => "Không thể xoá được thương hiệu!"], 422);
        }
    }
}
