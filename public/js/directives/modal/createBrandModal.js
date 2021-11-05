ngApp.directive('createBrandModal', function ($apply, $myLoader, $myNotify, $typeConfig,
                                              $brandService, notify, $myNotifies) {
    var templateUrl = SiteUrl + "/render/modal/insertBrandModal";
    var restrict = 'E';
    var scope = {
        modalDom: '=',
        retFunc: '&',
        brandData: '='
    };

    var link = function (scope) {

        scope.data = {
            idBrand: 0,
            titleModel: '',
            buttonModel: '',
            runBrandModal: () => {
                scope.data.configStatus = $typeConfig.configStatus;
            },
        }

        scope.action = {
            createBrand: () => {
                let params = $brandService.data.createBrand(scope.data.nameBrand, scope.data.status, scope.data.notes);

                if (scope.data.idBrand > 1){
                    $brandService.action.updateBrand(params, scope.data.idBrand).then((res) => {
                        $myNotifies.success(res.data.status, notify);
                        scope.retFunc();
                    }).catch((err) => {
                        $myNotifies.error(err.data.error, notify);
                    });
                } else {
                    $brandService.action.createBrand(params).then((res) => {
                        $myNotifies.success(res.data.status, notify);
                        $('#form-brand').trigger("reset");
                        scope.retFunc();
                    }).catch((err) => {
                        $myNotifies.error(err.data.error, notify);
                    });
                }
            }
        };

        scope.data.runBrandModal();

        scope.$watch('brandData', function (newVal, oldVal) {
            if (newVal && newVal.id > 0) {
                scope.data.titleModel = 'Cập nhật thương hiệu';
                scope.data.buttonModel = 'Cập nhật';
                scope.data.idBrand = newVal.id;
                scope.data.nameBrand = newVal.nameBrand;
                scope.data.status = newVal.status;
                scope.data.notes = newVal.notes;
            } else {
                scope.data.titleModel = 'Tạo thương hiệu';
                scope.data.buttonModel = 'Tạo';
                scope.data.nameBrand = '';
                scope.data.status = '';
                scope.data.notes = '';

            }
        })
    };

    return {
        restrict: restrict,
        scope: scope,
        templateUrl: templateUrl,
        link: link
    };
});
