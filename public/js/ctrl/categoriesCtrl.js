ngApp.controller('categoriesCtrl', function ($scope, $typeConfig, $categoryService, $myBootbox, $myNotifies, notify) {
    $scope.data = {
        listCategories: [],
        page: 1,
        perPage: 10,
        total: 0,
        keyword: '',
    }

    $scope.process = {
        listCategories: function () {
            let params = $categoryService.data.listCategory($scope.data.page, $scope.data.perPage, $scope.data.keyword);
            $categoryService.action.listCategory(params).then((res) => {
                console.log(res);
                $scope.data.listCategories = res.data.category.data;
                $scope.data.paging.current_page = res.data.category.current_page;
                $scope.data.paging.per_page = res.data.category.per_page;
                $scope.data.paging.total = res.data.category.total;
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
                return $typeConfig.configStatus['0'].name;
            } else {
                return $typeConfig.configStatus['1'].name;
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
        },
        changePage: (page) => {
            $scope.data.page = page;
            $scope.process.listCategories();
        },
        showOrder: (index) => {
            return (index + 1 + ($scope.data.page - 1) * $scope.data.perPage);
        },
        deleteCategory: (nameCategory, idCategory) => {
            $myBootbox.confirm(`Bạn có chắc chắn muốn xoá Loại sản phẩm ` + nameCategory + ` này không?`, function(result){
               if (result) {
                   $categoryService.action.deleteCategory(idCategory).then((res) => {
                       $myNotifies.success(res.data.status, notify);
                       $scope.process.listCategories();
                   }).catch((e) => {
                       $myNotifies.error(e.data.error, notify);
                   })
               }
            });
        }
    }

    $scope.process.listCategories();

});
