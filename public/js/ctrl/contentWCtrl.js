ngApp.controller('contentWCtrl', function ($scope, $typeConfig, $itemService,  $myNotifies, notify, $myBootbox) {
    $scope.data = {
        listItems: [],
        page: 1,
        perPage: 10,
        keyword: ''
    }

    $scope.process = {
        listItem: function () {
            $itemService.action.listItems().then(function (res) {
                console.log(res);
                $scope.data.listItems = res.data.products;
            }).catch(function (e) {
                console.log(e);
            });
        }
    }

    $scope.action = {

    }

    $scope.process.listItem();

});
