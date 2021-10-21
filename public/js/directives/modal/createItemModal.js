ngApp.directive('createItemModal', function ($apply, $myLoader, $myNotify, $itemService) {
    var templateUrl = SiteUrl + "/render/modal/createItemModal";
    var restrict = 'E';
    var scope = {
        modalDom: '=',
        retFunc: '&'
    };

    var link = function (scope) {

        scope.data = {

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

    };

    return {
        restrict: restrict,
        scope: scope,
        templateUrl: templateUrl,
        link: link
    };
});
