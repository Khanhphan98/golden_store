<!-- Modal inser user-->
<div class="modal fade" id="modalItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-dom='modalDom'>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tạo sản phẩm</h5>
            </div>
            <div class="modal-body" style="">
                <form>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="itemName">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="itemName" ng-model="data.itemName" placeholder="Tên sản phẩm">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="newPrice">Giá mới</label>
                            <input type="number" class="form-control" id="newPrice" ng-model="data.newPrice" placeholder="Giá mới">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="oldPrice">Giá cũ</label>
                            <input type="number" class="form-control" id="oldPrice" ng-model="data.oldPrice" placeholder="Giá cũ">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="size">Kích thước</label>
                            <input type="text" class="form-control" id="size" ng-model="data.size" placeholder="Kích thước">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="countItems">Số lượng</label>
                            <input type="text" class="form-control" id="countItems" ng-model="data.countItems" placeholder="Số lượng">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="category">Loại sản phẩm</label>
                            <input type="text" class="form-control" id="category" ng-model="data.category" placeholder="Loại sản phẩm">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="brand">Thương hiệu</label>
                            <select name="brand" id="brand" class="form-control" ng-model="data.brand">
                                <option value="">-- Chọn thương hiệu --</option>
                                <option ng-repeat="(key, value) in data.listBrand" value="@{{ key }}">@{{ value.nameBrand }}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="itemSex">Giới tính</label>
                            <input type="text" class="form-control" id="itemSex" ng-model="data.itemSex" placeholder="Giới tính">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="itemNote">Mô tả</label>
                            <input type="text" class="form-control" id="itemNote" ng-model="data.itemNote" placeholder="Mô tả">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="itemImage">Hình ảnh</label>
                            <label for="avatar" style="background-color: #579ddb;color: white;padding: 0.5rem;font-family: sans-serif;cursor: pointer;margin-top: 1rem;border-radius: 5px;">
                                <input accept="image/png,image/jpeg,image/jpg" onchange="readURL(this)" ng-model="data.avatar" name="avatar" id="avatar" type="file" style="display: none;"/>
                                <i class="fa fa-upload"></i> Chọn file
                            </label>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button ng-click="action.createItem()" class="btn btn-primary">Tạo</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal User-->
