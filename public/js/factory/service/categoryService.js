ngApp.factory('$categoryService', function ($rootScope, $http, $httpParamSerializer, $typeConfig) {
    var service = {
        action: {},
        data: {}
    };

    // data
    service.data.createCategory = function (nameCategory, parentId, status) {
        return {
            nameCategory: nameCategory,
            parentId: parentId || 0,
            status: status
        }
    }


    // action
    // lít brand
    service.action.listCategory = function () {
        let url = SiteUrl + '/rest/listCategory';
        return $http.get(url);
    }

    // create brand
    service.action.createCategory = function (params) {
        let url = SiteUrl + '/rest/createCategory';
        return $http.post(url, params);
    }


    return service;
});
