ngApp.directive('agencyModal', function ($apply, $myLoader, $agencyService, $myNotify) {
    var templateUrl = SiteUrl + "/modal/agencyModal";
    var restrict = 'E';
    var scope = {
        modalDom: '=',
        resetField: '=',
        retFunc: '&'
    };

    var link = function (scope) {
        scope.$watch('resetField', function (newVal, oldVal) {
            scope.data.modalData = {
            };


        });

        scope.data = {
            modalData: {},
            errMsg: {},
            getParam: function () {
                if (scope.data.modalData.agencyHasTMS) {
                    scope.data.modalData.agencyHasTMS = 1
                } else {
                    scope.data.modalData.agencyHasTMS = 0
                }
                var param = $agencyService.data.createUpdateAgency(
                    scope.data.modalData.name,
                    scope.data.modalData.taxCode,
                    scope.data.modalData.address,
                    scope.data.modalData.email,
                    scope.data.modalData.phone,
                    scope.data.modalData.hookUrl,
                    scope.data.modalData.hookUser,
                    scope.data.modalData.hookPassword,
                    scope.data.modalData.agencyHasTMS
                );
                return param;
            }
        }

        scope.action = {
            createAgency: function () {
                var param = scope.data.getParam();
                if ($("#formAgency").parsley().validate()) {//validate
                    $myLoader.show();

                    var param = scope.data.getParam();
                    $agencyService.action.createAgency(param).then((result) => {
                        scope.retFunc();
                        $myNotify.success('Thêm mới đại lý thành công');
                        $myLoader.hide();

                    }).catch((err) => {
                        $myNotify.err('Thêm mới đại lý thất bại')
                        scope.data.errMsg = err.data;
                        $myLoader.hide();

                    });
                }


            }
        };
    };

    return {
        restrict: restrict,
        scope: scope,
        templateUrl: templateUrl,
        link: link
    };
});