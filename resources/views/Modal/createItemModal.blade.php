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
                            <label for="size">Kích thước</label>c
                            <select name="size" id="size" class="form-control" ng-model="data.size">
                                <option value="">-- Kích thước --</option>
                                <option ng-repeat="(key, size) in data.listSizes" value="@{{ size.value }}">@{{ size.value }}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="countItems">Số lượng</label>
                            <input type="text" class="form-control" id="countItems" ng-model="data.countItems" placeholder="Số lượng">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="category">Loại sản phẩm</label>
                            <select name="category" id="category" class="form-control" ng-model="data.category">
                                <option value="">-- Loại sản phẩm --</option>
                                <option ng-repeat="(key, value) in data.listCategory" value="@{{ value.id }}">@{{ value.nameCategory }}</option>
                            </select>
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
                            <select name="itemSex" id="itemSex" class="form-control" ng-model="data.itemSex">
                                <option value="">-- Chọn giới tính --</option>
                                <option ng-repeat="(key, value) in data.listSex" value="@{{ value }}">@{{ value }}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="itemNote">Mô tả</label>
                            <textarea name="itemNote" class="form-control" ng-model="data.itemNote" id="itemNote" cols="1" rows="5"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="itemImage">Hình ảnh</label>
                            <label for="avatar" style="background-color: #579ddb;color: white;padding: 0.5rem;font-family: sans-serif;cursor: pointer;margin-top: 1rem;border-radius: 5px;">
                                <input accept="image/png,image/jpeg,image/jpg" onchange="readURL(this)" ng-model="data.avatar" name="avatar" id="avatar" type="file" style="display: none;"/>
                                Chọn file
                            </label>
                            <img style="border-radius: 50%" height="100px" width="100px" ng-src="@{{ action.loadImage(data.avatar) }}" id="image_preview">
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
