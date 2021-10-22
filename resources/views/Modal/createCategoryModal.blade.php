<div class="modal fade" id="modalItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-dom='modalDom'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tạo loại sản phẩm</h5>
            </div>
            <div class="modal-body" style="">
                <form id="formCategory" data-parsley-validate="true" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nameCategory">Tên loại sản phẩm</label>
                        <input type="text" class="form-control" id="nameCategory" ng-model="data.nameCategory" placeholder="Tên loại sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="parentId">Trực thuộc</label>
                        <select name="parentId" id="parentId" class="form-control" ng-model="data.parentId">
                            <option value="">-- Chọn trực thuộc --</option>
                            <option ng-repeat="(key, value) in data.listCategories" value="@{{ value.id }}">@{{ value.nameCategory }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select name="status" id="status" class="form-control" ng-model="data.status">
                            <option value="">-- Chọn trạng thái --</option>
                            <option ng-repeat="(key, value) in data.configStatus" value="@{{ key }}">@{{ value }}</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button ng-click="action.createCategory()" data-dismiss="modal" class="btn btn-primary">Tạo</button>
                <button class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
