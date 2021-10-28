ngApp.controller('brandCtrl', function ($scope, $typeConfig, $brandService) {
    $scope.data = {
        listBrand: [],
        page: 1,
        perPage: 10,
        keyword: ''
    }

    $scope.process = {
        listBrand: () => {
            let params = $brandService.data.listBrand($scope.data.page, $scope.data.perPage, $scope.data.keyword);

            $brandService.action.listBrand(params).then((res) => {
                console.log(res);
                $scope.data.listBrand = res.data.listBrand.data;
                $scope.data.paging.current_page = res.data.listBrand.current_page;
                $scope.data.paging.per_page = res.data.listBrand.per_page;
                $scope.data.paging.total = res.data.listBrand.total;
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
                return $typeConfig.configStatus[0].name;
            } else {
                return $typeConfig.configStatus[0].name;
            }
        },
        changePage: (page) => {
            $scope.data.page = page;
            $scope.process.listBrand();
        },
        showOrder: (index) => {
            return (index + 1 + ($scope.data.page - 1) * $scope.data.perPage);
        },
        deleteBrand: (brandID, brandName) => {
            
    }
    }

    $scope.process.listBrand();

});
