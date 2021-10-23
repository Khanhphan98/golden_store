ngApp.directive('createItemModal', function ($apply, $myLoader, $myNotify,
                                             $itemService, $brandService, $categoryService, $typeConfig) {
    var templateUrl = SiteUrl + "/render/modal/createItemModal";
    var restrict = 'E';
    var scope = {
        modalDom: '=',
        retFunc: '&'
    };

    var link = function (scope) {

        scope.data = {
            listBrand: [],
            listCategory: [],
            listSex: []
        }

        scope.process = {
            listBrand: () => {
                $brandService.action.listBrand().then((res) => {
                    scope.data.listBrand = res.data.listBrand;
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
            runModal: () => {
                scope.process.listBrand();
                scope.process.listCategories();
                scope.process.listSexs();
            }
        }

        scope.action = {
            createItem: () => {
                let params = $itemService.data.createItem(scope.data.itemName, scope.data.newPrice, scope.data.oldPrice,
                scope.data.size, scope.data.countItems, scope.data.category, scope.data.brand,
                    scope.data.itemSex, scope.data.itemNote, scope.data.avatar);
                console.log(params);
                $itemService.action.createItem(params).then((res) => {
                    console.log(res);
                }).catch((e) => {
                   console.log(e);
                });

            },

        };

        scope.process.runModal();

    };

    return {
        restrict: restrict,
        scope: scope,
        templateUrl: templateUrl,
        link: link
    };
});
