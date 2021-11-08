ngApp.directive('createCategoryModal', function ($apply, $myLoader, $myNotifies, $typeConfig, $categoryService, notify) {
    var templateUrl = SiteUrl + "/render/modal/createCategoryModal";
    var restrict = 'E';
    var scope = {
        modalDom: '=',
        retFunc: '&',
        runAction: '&',
        categoryData: '='
    };

    var link = function (scope) {

        scope.data = {
            listCategories: [],
            idCategory: ''
        }

        scope.process = {
            listCategory: () => {
                $categoryService.action.selectListCategory().then((res) => {
                    scope.data.listCategories = res.data.category;
                }).catch((err) => {
                    console.log(err);
                })
            },
            runModal: () => {
                scope.data.configStatus = $typeConfig.configStatus;
                scope.process.listCategory();
            }
        }

        scope.action = {
            createCategory: () => {
                let params = $categoryService.data.createCategory(scope.data.nameCategory, scope.data.parentId, scope.data.status);
                if (scope.data.idCategory > 0) {
                    $categoryService.action.updateCategory(params, scope.data.idCategory).then((res) => {
                        $myNotifies.success(res.data.status, notify);
                        scope.retFunc();
                    }).catch((err) => {
                        $myNotifies.error(err.data.error, notify);
                    })
                } else {
                    $categoryService.action.createCategory(params).then((res) => {
                        $myNotifies.success(res.data.status, notify);
                        scope.retFunc();
                    }).catch((err) => {
                        $myNotifies.error(err.data.error, notify);
                    });
                }

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
        };

        scope.$watch('categoryData', function (newVal, oldVal){
            scope.process.listCategory();
            if (newVal && newVal.id > 0) {
                $apply(function () {
                    scope.data.titleModel   = 'Cập nhật loại sản phẩm';
                    scope.data.btnModel     = 'Cập nhật';
                    scope.data.nameCategory = newVal.nameCategory;
                    parseInt(newVal.parentId) === 0 ? scope.data.parentId = "" : scope.data.parentId = parseInt(newVal.parentId);
                    scope.data.status       = newVal.status;
                    scope.data.idCategory   = newVal.id;
                })
            } else {
                try {
                    scope.data.idCategory = newVal.id;
                    scope.data.checkModel = false;
                    scope.data.titleModel = 'Tạo loại sản phẩm';
                    scope.data.btnModel = 'Tạo';
                    $('#form-category')[0].reset();
                } catch (e) {

                }
            }
        });

        scope.process.runModal();

    };

    return {
        restrict: restrict,
        scope: scope,
        templateUrl: templateUrl,
        link: link
    };
});
