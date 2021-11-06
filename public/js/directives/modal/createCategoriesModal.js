ngApp.directive('createCategoryModal', function ($apply, $myLoader, $myNotifies, $typeConfig, $categoryService, notify) {
    var templateUrl = SiteUrl + "/render/modal/createCategoryModal";
    var restrict = 'E';
    var scope = {
        modalDom: '=',
        retFunc: '&',
        runAction: '&'
    };

    var link = function (scope) {

        scope.data = {
            listCategories: [],
        }

        scope.process = {
            listCategory: () => {
                $categoryService.action.selectListCategory().then((res) => {
                    scope.data.listCategories = res.data.category;
                }).catch((err) => {
                    console.log(err);
                })
            },
            runModal: () => {
                scope.data.configStatus = $typeConfig.configStatus;
                scope.process.listCategory();
            }
        }

        scope.action = {
            createCategory: () => {
                let params = $categoryService.data.createCategory(scope.data.nameCategory, scope.data.parentId, scope.data.status);
                $categoryService.action.createCategory(params).then((res) => {
                    $myNotifies.success(res.data.status, notify);
                    scope.retFunc();
                }).catch((err) => {
                    console.log(err);
                    $myNotifies.error(err.data.error, notify);
                });
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
        };

        scope.process.runModal();

    };

    return {
        restrict: restrict,
        scope: scope,
        templateUrl: templateUrl,
        link: link
    };
});
