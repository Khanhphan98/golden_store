ngApp.directive('createBrandModal', function ($apply, $myLoader, $myNotify, $typeConfig,
                                              $brandService, notify, $myNotifies) {
    var templateUrl = SiteUrl + "/render/modal/insertBrandModal";
    var restrict = 'E';
    var scope = {
        modalDom: '=',
        retFunc: '&'
    };

    var link = function (scope) {

        scope.data = {
            runBrandModal: () => {
                scope.data.configStatus = $typeConfig.configStatus;
            },
        }

        scope.action = {
            createBrand: () => {
                let params = $brandService.data.createBrand(scope.data.nameBrand, scope.data.status, scope.data.notes);
                $brandService.action.createBrand(params).then((res) => {
                    $myNotifies.success(res.data.status, notify);
                    $('#form-brand').trigger("reset");
                    scope.retFunc();
                }).catch((err) => {
                    $myNotifies.error(err.data.error, notify);
                });
            }
        };

        scope.data.runBrandModal();
    };

    return {
        restrict: restrict,
        scope: scope,
        templateUrl: templateUrl,
        link: link
    };
});
