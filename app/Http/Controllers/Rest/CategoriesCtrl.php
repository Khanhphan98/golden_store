<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Categories;
use DB, Validator;
use Monolog\Handler\AmqpHandler;

class CategoriesCtrl extends Controller
{
    public function listCategory(Categories $categories, Request $request) {
        $validator = Validator::make($request->all(), [
            'page' => 'required',
            'perPage' => 'required',
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

        $category = $categories->orderByPath()->paginate($perPage);
        return response()->json(['category' => $category], 200);
    }

    public function selectListCategory(Categories $categories) {
        $category = $categories->orderByPath()->get();
        return response()->json(['category' => $category], 200);
    }

    public function createCategory(Request $request, Categories $category) {
        $validator = Validator::make($request->all(), [
            'nameCategory' => 'required',
            'parentId' => 'required',
            'status' => 'required',
        ], [
            'nameCategory.required' => 'Category name is required',
            'parentId.required' => 'Category parent ID is required',
            'status.required' => 'Category status is required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $parentId = $request->input('parentId');
        $path = '';

        DB::beginTransaction();
        try {
            if ($parentId == 0) {
                $category->nameCategory = $request->input('nameCategory');
                $category->path = $parentId;
                $category->parentId = $parentId;
                $category->status = $request->input('status');
                $category->save();

                $categoryId = DB::getPdo()->lastInsertId();
                $this->_updateCategory($category, $request, $categoryId, $path);

            } else {
                $path = $category->find($parentId)->path;
                $category->nameCategory = $request->input('nameCategory');
                $category->path = $path;
                $category->parentId = $parentId;
                $category->status = $request->input('status');
                $category->save();

                $categoryId = DB::getPdo()->lastInsertId();
                $this->_updateCategory($category, $request, $categoryId, $path);
            }
            DB::commit();
            return response()->json(['status' => 'Tạo loại sản phẩm thành công'], 200);
        } catch (\Exception $e){
            DB::rollback();
            return response()->json(['error' => $e], 422);
        }

    }

    public function _updateCategory($category, $request, $categoryId, $path){
        $categories = $category->find($categoryId);
        $categories->nameCategory = $request->input('nameCategory');
        $path == '' ? ($categories->path = '/' . $categoryId . '/') : ($categories->path = $path . $categoryId . '/');
        $categories->parentId = $request->input('parentId');
        $categories->status = $request->input('status');
        $categories->save();
    }

    public function deleteCategory(Categories $categories, $idCategory) {
        $category = $categories->find($idCategory);

        if (empty($category)) {
            return response()->json(['status' => 'Đơn vị không tồn tại'], 422);
        }

        $categoryCheck = $categories->checkParentID($idCategory)->get();
        if (count($categoryCheck) > 0) {
            return response()->json(['error' => 'Loại sản phẩm còn ràng buộc với các loại sản phẩm con khác'], 422);
        }

        DB::beginTransaction();

        try {
            $category->delete();
            DB::commit();

            return response()->json(['status' => 'Xoá loại sản phẩm thành công'], 200);
        } catch (\Exception $e){
            DB::rollback();
            return response()->json(['error' => $e], 422);
        }
    }

    public function updateCategory(Categories $categories, Request $request, $idCategory) {
        $validator = Validator::make($request->all(), [
            'nameCategory' => 'required',
            'parentId' => 'required',
            'status' => 'required',
        ], [
            'nameCategory.required' => 'Category name is required',
            'parentId.required' => 'Category parent ID is required',
            'status.required' => 'Category status is required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $parentId = $request->input('parentId');
        $path = '';

        DB::beginTransaction();
        try {
            if ($parentId == 0) {
                $category = $categories->find($idCategory);
                $categories->nameCategory = $request->input('nameCategory');
                $categories->path = '/' . $idCategory . '/';
                $categories->parentId = $request->input('parentId');
                $categories->status = $request->input('status');
                $categories->save();
            } else {
                $path = $categories->find($parentId)->path;

                $category = $categories->find($idCategory);
                $category->nameCategory = $request->input('nameCategory');
                $category->path = $path . $idCategory . '/';
                $category->parentId = $parentId;
                $category->status = $request->input('status');
                $category->save();
            }
            DB::commit();

            return response()->json(['status' => 'Cập nhật loại sản phẩm thành công'], 200);
        } catch (\Exception $e){
            DB::rollback();
            return response()->json(['error' => $e], 422);
        }

    }
}
