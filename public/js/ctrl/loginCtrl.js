ngApp.controller('loginCtrl', function ($scope, $typeConfig, $userService) {
    $scope.data = {
        checkPass: false,
        typePassword: $typeConfig.typePassword.hide

    }

    $scope.action = {
        login: function () {
            if ($($scope.formLogin).parsley().validate()) {
                let params = $userService.data.login($scope.data.email, $scope.data.password, $scope.data.rememberToken);
                $userService.action.login(params).then(function (res) {
                    console.log(res);
                    window.location.href = SiteUrl + '/home';
                }).catch(function (err) {
                    console.error(err);
                });
            }
        },
        showPassword: function (type) {
            if (type){
                $scope.data.typePassword = $typeConfig.typePassword.show;
                $scope.data.checkPass = true;
            } else {
                $scope.data.typePassword = $typeConfig.typePassword.hide;
                $scope.data.checkPass = false;
            }
        }
    }
});
