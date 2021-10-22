ngApp.controller('categoriesCtrl', function ($scope, $typeConfig, $categoryService) {
    $scope.data = {
        listCategories: [],
        page: 1,
        perPage: 10,
        total: 0,
        keyword: '',
    }

    $scope.process = {
        listCategories: function () {
            $categoryService.action.listCategory().then((res) => {
                $scope.data.listCategories = res.data.category;
                console.log($scope.data.listCategories);
            }).catch((error) => {
               console.log(error);
            });
        }
    }

    $scope.action = {
        showCreateCategoryModal: function () {
            $($scope.domCategoryModal).modal('show');
        },
        checkStatus: (status) => {
            if (status == 0) {
                return $typeConfig.configStatus['0'];
            } else {
                return $typeConfig.configStatus['1'];
            }
        },
        closeModal: () => {
            $($scope.domCategoryModal).modal('hide');
            $scope.process.listCategories();
        },
        formatCategory: (nameCategory, path) => {
            let str = path.split('/');
            str.shift(); str.pop();
            let trim = '';
            if (str.length > 1) {
                for (let i = 0; i < str.length; i++) {
                    trim = trim + '--';
                }
            }
            return trim + ' ' + nameCategory;
        }
    }

    $scope.process.listCategories();

});
