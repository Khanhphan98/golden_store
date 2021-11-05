<div class="modal fade" id="modalItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-dom='modalDom'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tạo thương hiệu</h5>
            </div>
            <div class="modal-body" style="">
                <form id="form-brand" class="form-horizontal" data-parsley-validate enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nameBrand">Tên thương hiệu</label>
                        <input type="text" class="form-control" id="nameBrand" ng-model="data.nameBrand" placeholder="Tên thương hiệu">
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select name="status" id="status" class="form-control" ng-model="data.status">
                            <option value="">-- Chọn trạng thái --</option>
                            <option ng-repeat="(key, status) in data.configStatus" value="@{{ status.value }}">@{{ status.name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="notes">Mô tả</label>
                        <textarea class="form-control" name="notes" id="notes" ng-model="data.notes" rows="4" cols="50">
                        </textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button ng-click="action.createBrand()" class="btn btn-primary">Tạo</button>
            </div>
        </div>
    </div>
</div>
