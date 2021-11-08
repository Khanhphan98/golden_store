@extends('layouts.app')

@section('pageTitle', 'TK - Quản lý thương hiệu')

@section('myJs')
    {{--  Service  --}}
    <script src="{{ url('') }}/js/factory/service/brandService.js"></script>
    {{--  Directive  --}}
    <script src="{{ url('') }}/js/directives/modal/createBrandModal.js"></script>
    {{--  Ctrl  --}}
    <script src="{{ url('') }}/js/ctrl/brandCtrl.js"></script>
@endsection()

@section('content')
    <div ng-controller="brandCtrl">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thương hiệu</h1>
            <button ng-click="action.showEditBrandModal()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i> Create</button>
        </div>
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Quản lý thương hiệu</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên thương hiệu</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Phương thức</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="(key, value) in data.listBrand">
                                    <td>@{{ action.showOrder(key) }}</td>
                                    <td>@{{ value.nameBrand }}</td>
                                    <td>@{{ action.checkStatus(value.status) }}</td>
                                    <td class="wrapper-content">
                                        <p>@{{ value.notes }}</p>
                                    </td>
                                    <td>
                                        <button class="btn btn-success" ng-click="action.showEditBrandModal(value)">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger" ng-click="action.deleteBrand(value.id, value.nameBrand)">
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
        <create-brand-modal brand-data="brandData" ret-func="action.closeModal()" modal-dom="domBrandModal"></create-brand-modal>
    </div>
@endsection
