ngApp.controller('brandCtrl', function ($scope, $typeConfig, $brandService, $myNotify, $myNotifies, notify, $myBootbox) {
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
            $myBootbox.confirm(`Bạn có chắc chắn muốn xoá Thương hiệu <b>` + brandName + `</b> này không?`, function (result) {
                if (result) {
                    $brandService.action.deleteBrand(brandID).then((res) => {
                        $scope.process.listBrand();
                        $myNotifies.success(res.data.status, notify);
                    }).catch((err) => {
                        $myNotifies.error(err.data.error, notify);
                    });
                }
            })
        },
        closeModal: () => {
            $($scope.domBrandModal).modal('hide');
            $scope.process.listBrand();
        }
    }

    $scope.process.listBrand();

});
