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

        if ($parentId == 0) {
            $category->nameCategory = $request->input('nameCategory');
            $category->path = $parentId;
            $category->parentId = $parentId;
            $category->status = $request->input('status');
            $category->save();

            $categoryId = DB::getPdo()->lastInsertId();
            $this->_updateCategory($category, $request, $categoryId, $path);

            return response()->json(['status' => true], 200);
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
    }

    public function _updateCategory($category, $request, $categoryId, $path){
        $categories = $category->find($categoryId);
        $categories->nameCategory = $request->input('nameCategory');
        $path == '' ? ($categories->path = '/' . $categoryId . '/') : ($categories->path = $path . $categoryId . '/');
        $categories->parentId = $request->input('parentId');
        $categories->status = $request->input('status');
        $categories->save();
    }
}
