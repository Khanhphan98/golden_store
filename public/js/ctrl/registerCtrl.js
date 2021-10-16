ngApp.controller('registerCtrl', function ($scope, $typeConfig, $userService) {
    $scope.data = {
        listData: [],
        days: [],
        months: [],
        years: [],
        typePassword: $typeConfig.typePassword.hide,
        checkShowPassword: false,
    }



    $scope.action = {
        changeBirthday: function () {
            for(let key in $typeConfig.listMonthView){
                $scope.data.months.push($typeConfig.listMonthView[key]);
            }
            for(let i = 1; i <= 31; i++) {
                $scope.data.days.push(i);
            }
            let date = new Date();
            for(let i = 0; i < 100; i++) {
                $scope.data.years.push(date.getFullYear() - i);
            }
        },
        showPassword: function () {
            switch ($scope.data.checkShowPassword) {
                case true:
                    $scope.data.checkShowPassword = false;
                    $scope.data.typePassword =  $typeConfig.typePassword.hide;
                    break;
                case false:
                    $scope.data.checkShowPassword = true;
                    $scope.data.typePassword =  $typeConfig.typePassword.show;
                    break;
            }
        },
        checkYear: function (newVal) {
            let check = false;
            let year = (parseInt(newVal) % 4 === 0) ? (
                (parseInt(newVal) % 100 === 0) ? (
                    (parseInt(newVal) % 400 === 0) ? check = true : check = false) : check = true) : check = false;
            return check;
        },
        formatDate: function (day, month, year) {
            let months = _.find($typeConfig.listMonthView, function (o) { return o['displayView'] === month });
            let date = year + '-' + month + '-' + day;
            return moment(new Date(date)).format('YYYY-MM-DD');
        },
        register: function () {
            if ($($scope.formRegister).parsley().validate()) {
                if ($scope.data.password === $scope.data.confirmPassword) {
                    $scope.data.error = false;
                    let birthday = $scope.action.formatDate($scope.data.day, $scope.data.month, $scope.data.year);
                    let data = $userService.data.register($scope.data.name, $scope.data.phone, $scope.data.email,
                        $scope.data.address, birthday, $scope.data.password);
                    $userService.action.register(data).then(function (res) {
                        window.location.href = SiteUrl + '/login';
                    }).catch(function (err) {
                        console.log(err);
                    });
                } else {
                    $scope.data.error = true;
                }
            }
        }
    }

    $scope.action.changeBirthday();
    $scope.$watch('data.month', function(newVal, oldVal) {
        if (newVal) {
            let docs = _.find($scope.data.months, function (o) { return o['displayView'] === newVal; });
            $scope.data.days = [];
            let check = $scope.action.checkYear($scope.data.year);
            if (check === true && newVal === $typeConfig.listMonthView['2'].displayView){
                for(let i = 1; i <= 29; i++) {
                    $scope.data.days.push(i);
                }
            } else {
                for(let i = 1; i <= docs.value; i++) {
                    $scope.data.days.push(i);
                }
            }
        }
    });
    $scope.$watch('data.year', function (newVal, oldVal) {
       if (newVal) {
           let check = $scope.action.checkYear(newVal);
           check === true ? ($scope.data.months[1].value  = 29) : ($scope.data.months[1].value  = 28);
           if (check === true && $scope.data.month === $typeConfig.listMonthView['2'].displayView){
               $scope.data.days = [];
               for(let i = 1; i <= 29; i++) {
                   $scope.data.days.push(i);
               }
           } else if (check === false && $scope.data.month === $typeConfig.listMonthView['2'].displayView) {
               $scope.data.days = [];
               for(let i = 1; i <= 28; i++) {
                   $scope.data.days.push(i);
               }
           }

       }
    });
});
