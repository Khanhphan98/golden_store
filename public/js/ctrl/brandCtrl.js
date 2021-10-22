ngApp.controller('brandCtrl', function ($scope, $typeConfig, $brandService) {
    $scope.data = {
        listBrand: [],
    }

    $scope.process = {
        listBrand: () => {
            $brandService.action.listBrand().then((res) => {
                console.log(res);
                $scope.data.listBrand = res.data.listBrand;
            }).catch((err) => {
                console.error(err);
            });
        }
    }

    $scope.action = {
        showCreateBrandModal: function () {
            $($scope.domBrandModal).modal('show');
        },
        checkStatus: (status) => {
            if (status == 0) {
                return $typeConfig.configStatus['0'];
            } else {
                return $typeConfig.configStatus['1'];
            }
        }
    }

    $scope.process.listBrand();

});
