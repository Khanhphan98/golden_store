ngApp.controller('itemCtrl', function ($scope, $typeConfig, $itemService) {
    $scope.data = {
        listItems: [],
    }

    $scope.process = {
        listItem: function () {
            $itemService.action.listItem().then(function (res) {
                console.log(res);
                $scope.data.listItems = res.data.products;
            }).catch(function (e) {
               console.log(e);
            });
        }
    }

    $scope.action = {
        showCreateItemModal: function () {
            console.log(123);
            $($scope.domItemModal).modal('show');
        },
        closeModal: function () {
            $($scope.domItemModal).modal('hide');
        },
    }

    $scope.process.listItem();

});
