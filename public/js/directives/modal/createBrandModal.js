ngApp.directive('createBrandModal', function ($apply, $myLoader, $myNotify, $typeConfig, $brandService) {
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
                let params = {
                    nameBrand: scope.data.nameBrand,
                    status: scope.data.status,
                    notes: scope.data.notes
                }
                console.log(params);
                $brandService.action.createBrand(params).then((res) => {
                    console.log(res);
                }).catch((err) => {
                    console.log(err);
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
