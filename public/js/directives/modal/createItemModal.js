ngApp.directive('createItemModal', function ($apply, $myLoader, $myNotify, $myFile,  $myNotifies, notify, $myBootbox,
                                             $itemService, $brandService, $categoryService, $typeConfig) {
    var templateUrl = SiteUrl + "/render/modal/createItemModal";
    var restrict = 'E';
    var scope = {
        modalDom: '=',
        retFunc: '&',
        itemData: '='
    };

    var link = function (scope) {

        scope.data = {
            listBrand: [],
            listCategory: [],
            listSex: [],
            listSizes: [],
            status: 0,
            btnModel: 'Tạo',
            titleModel: 'Tạo sản phẩm'
        }

        scope.process = {
            listBrand: () => {
                $brandService.action.selectBrand().then((res) => {
                    scope.data.listBrand = res.data.data;
                }).catch((err) => {
                    console.error(err);
                });
            },
            listCategories: () => {
                $categoryService.action.selectListCategory().then((res) => {
                    scope.data.listCategory = res.data.category;
                }).catch((error) => {
                    console.log(error);
                });
            },
            listSexs: () => {
                scope.data.listSex = $typeConfig.configSex;
            },
            listSize: () => {
                scope.data.listSizes = $typeConfig.configSize;
            },
            runModal: () => {
                scope.process.listBrand();
                scope.process.listCategories();
                scope.process.listSexs();
                scope.process.listSize();
            },
            formatCategory: (nameCategory, path) => {
                let str = path.split('/');
                str.shift(); str.pop();
                let trim = '';
                if (str.length > 1) {
                    for (let i = 0; i < str.length; i++) {
                        trim = trim + '--';
                    }
                }
                return trim + ' ' + nameCategory;
            },
        }

        scope.action = {
            createItem: () => {
                    let params = $itemService.data.createItem(scope.data.itemName, scope.data.newPrice, scope.data.oldPrice,
                        scope.data.size, scope.data.countItems, scope.data.categoryID, scope.data.brandID,
                        scope.data.itemSex, scope.data.itemNote, scope.uploadfiles, scope.data.status);
                    $itemService.action.createItem(params).then((res) => {
                        scope.retFunc();
                        $myNotifies.success(res.data.status, notify);
                    }).catch((e) => {
                        console.log(e);
                        $myNotifies.error(e.data.error, notify);
                    });
            },
            loadImage: function (params) {
                return $myFile.avatar(params);
            },
        };

        scope.$watch('itemData', function (newVal, oldVal) {
            if (newVal && newVal.id > 0) {
                scope.data.itemName = newVal.itemName;
                scope.data.newPrice = newVal.newPrice;
                scope.data.oldPrice = newVal.oldPrice;
                scope.data.size = newVal.size;
                scope.data.countItems = newVal.countItems;
                scope.data.categoryID = newVal.category_id;
                scope.data.brandID = newVal.brand_id;
                scope.data.itemSex = newVal.itemSex;
                scope.data.itemNote = newVal.itemNote;
                scope.data.uploadfiles = newVal.uploadfiles;
                scope.data.status = newVal.status;

                scope.data.titleModel = 'Cập nhập sản phẩm';
                scope.data.btnModel   = 'Cập nhật';
            } else {
                $('#form-item')[0].reset();
                console.log('Tạo sản phẩm')
                scope.data.titleModel = 'Tạo sản phẩm';
                scope.data.btnModel   = 'Tạo';
                scope.data.categoryID = '';
                scope.data.brandID = '';
                scope.data.itemSex = '';
            }
        })

        scope.process.runModal();

    };

    return {
        restrict: restrict,
        scope: scope,
        templateUrl: templateUrl,
        link: link
    };
});
