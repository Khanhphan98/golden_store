@extends('layouts.app')

@section('myJs')
    {{--  Service  --}}
    <script src="{{ url('') }}/js/factory/service/categoryService.js"></script>
    {{--  Directive  --}}
    <script src="{{ url('') }}/js/directives/modal/createCategoriesModal.js"></script>
    {{--  Ctrl  --}}
    <script src="{{ url('') }}/js/ctrl/categoriesCtrl.js"></script>
@endsection()

@section('content')
    <div ng-controller="categoriesCtrl">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Loại sản phẩm</h1>
            <button ng-click="action.showEditCategoryModal()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i> Create</button>
        </div>
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Quản lý các loại sản phẩm</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Loại sản phẩm</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Phương thức</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="(key, value) in data.listCategories">
                                <td>@{{ action.showOrder(key) }}</td>
                                <td>@{{ action.formatCategory(value.nameCategory, value.path) }}</td>
                                <td>@{{ action.checkStatus(value.status) }}</td>
                                <td>
                                    <button class="btn btn-success" ng-click="action.showEditCategoryModal(value)">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger" ng-click="action.deleteCategory(value.nameCategory, value.id)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <div class="text-center">
                            <ul class="pagination">
                                <div paging page="data.paging.current_page" page-size="data.paging.per_page" total="data.paging.total"
                                     paging-action="action.changePage(page)">
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <create-category-modal ret-func="action.closeModal()" category-data="categoryData" run-action="data.runAction" modal-dom="domCategoryModal"></create-category-modal>
    </div>
@endsection
