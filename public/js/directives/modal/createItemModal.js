ngApp.directive('createItemModal', function ($apply, $myLoader, $myNotify, $itemService, $brandService) {
    var templateUrl = SiteUrl + "/render/modal/createItemModal";
    var restrict = 'E';
    var scope = {
        modalDom: '=',
        retFunc: '&'
    };

    var link = function (scope) {

        scope.data = {
            listBrand: [],
        }

        scope.process = {
            listBrand: () => {
                $brandService.action.listBrand().then((res) => {
                    scope.data.listBrand = res.data.listBrand;
                }).catch((err) => {
                    console.error(err);
                });
            },
            runModal: () => {
                scope.process.listBrand();
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
