ngApp.controller('itemCtrl', function ($scope, $typeConfig, $itemService,  $myNotifies, notify, $myBootbox) {
    $scope.data = {
        listItems: [],
        page: 1,
        perPage: 10,
        keyword: ''
    }

    $scope.process = {
        listItem: function () {
            let params =  $itemService.data.listItem($scope.data.page, $scope.data.perPage, $scope.data.keyword);
            $itemService.action.listItem(params).then(function (res) {
                console.log(res);
                $scope.data.listItems = res.data.products.data;
                $scope.data.paging.current_page = res.data.products.current_page;
                $scope.data.paging.per_page = res.data.products.per_page;
                $scope.data.paging.total = res.data.products.total;
            }).catch(function (e) {
               console.log(e);
            });
        }
    }

    $scope.action = {
        showCreateItemModal: function () {
            $($scope.domItemModal).modal('show');
        },
        closeModal: function () {
            $($scope.domItemModal).modal('hide');
            $scope.process.listItem();
        },
        changePage: (page) => {
            $scope.data.page = page;
            $scope.process.listItem();
        },
        showOrder: (index) => {
            return (index + 1 + ($scope.data.page - 1) * $scope.data.perPage);
        }
    }

    $scope.process.listItem();

});
