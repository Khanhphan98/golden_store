<div class="modal fade" id="modalItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-dom='modalDom'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">@{{ data.titleModel }}</h5>
            </div>
            <div class="modal-body" style="">
                <form id="form-category" ng-dom="formCategory" data-parsley-validate enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nameCategory">Tên loại sản phẩm</label>
                        <input type="text" class="form-control" id="nameCategory" ng-model="data.nameCategory" placeholder="Tên loại sản phẩm" required>
                    </div>
                    <div class="form-group">
                        <label for="parentId">Trực thuộc</label>
                        <select id="parentId" class="form-control" ng-model="data.parentId">
                            <option value="">-- Chọn trực thuộc --</option>
                            <option ng-repeat="(key, category) in data.listCategories"
                                    ng-value="category.id" value="@{{ category.id }}"
                                    ng-selected="category.id == data.parentId" >
                                @{{ action.formatCategory(category.nameCategory, category.path) }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select name="status" id="status" class="form-control" ng-model="data.status" required>
                            <option value="">-- Chọn trạng thái --</option>
                            <option ng-repeat="(key, status) in data.configStatus" ng-value="status.value" value="@{{ status.value }}">@{{ status.name }}</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button ng-click="action.createCategory()" data-dismiss="modal" class="btn btn-primary">@{{ data.btnModel }}</button>
                <button class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
