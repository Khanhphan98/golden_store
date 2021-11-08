@extends('layouts.app')

@section('pageTitle', 'TK - Quản lý sản phẩm')

@section('myCss')
    <link href="{{ asset('css/uploadFile.css') }}" rel="stylesheet">
@endsection()

@section('myJs')
    {{--  Service  --}}
    <script src="{{ url('') }}/js/factory/service/itemService.js"></script>
    <script src="{{ url('') }}/js/factory/service/brandService.js"></script>
    <script src="{{ url('') }}/js/factory/service/categoryService.js"></script>
    {{--  Directive  --}}
    <script src="{{ url('') }}/js/directives/modal/createItemModal.js"></script>
    {{--  Ctrl  --}}
    <script src="{{ url('') }}/js/ctrl/itemCtrl.js"></script>
@endsection()

@section('content')
    <div ng-controller="itemCtrl">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sản phẩm</h1>
            <button ng-click="action.showEditItemModal()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i> Create</button>
        </div>
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Items Management</h6>
                        <div class="dropdown no-arrow">

                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Mã sản phẩm</th>
                                <th scope="col">Giá tiền</th>
                                <th scope="col">Loại sản phẩm</th>
                                <th scope="col">Thương hiệu</th>
                                <th scope="col">Phương thức</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="(key, item) in data.listItems">
                                    <th scope="row">@{{ action.showOrder(key) }}</th>
                                    <td class="wrapper-content">
                                        <p style="width: 200px">@{{ item.itemName }}</p>
                                    </td>
                                    <td>@{{ item.itemCode }}</td>
                                    <td>@{{ item.newPrice }}</td>
                                    <td>@{{ item.nameCategory }}</td>
                                    <td>@{{ item.nameBrand }}</td>
                                    <td>
                                        <button class="btn btn-success" ng-click="action.showEditItemModal(item)">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger" ng-click="action.deleteItem(item.itemName, item.id)">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
        </div>
        <create-item-modal item-data="itemData" ret-func="action.closeModal()" modal-dom="domItemModal"></create-item-modal>
    </div>
@endsection
