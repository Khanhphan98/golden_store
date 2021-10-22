@extends('layouts.app')

@section('myJs')
    {{--  Service  --}}
    <script src="{{ url('') }}/js/factory/service/itemService.js"></script>
    {{--  Directive  --}}
    <script src="{{ url('') }}/js/directives/modal/createItemModal.js"></script>
    {{--  Ctrl  --}}
    <script src="{{ url('') }}/js/ctrl/itemCtrl.js"></script>
@endsection()

@section('content')
    <div ng-controller="categoriesCtrl">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Loại sản phẩm</h1>
            <button ng-click="action.showCreateItemModal()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
