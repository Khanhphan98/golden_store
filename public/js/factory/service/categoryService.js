ngApp.factory('$categoryService', function ($rootScope, $http, $httpParamSerializer, $typeConfig) {
    var service = {
        action: {},
        data: {}
    };

    // data
    service.data.listCategory = function (page, perPage, keyword) {
        return {
            page: page,
            perPage: perPage || 15,
            keyword: keyword || "",
        }
    }

    service.data.createCategory = function (nameCategory, parentId, status) {
        return {
            nameCategory: nameCategory,
            parentId: parentId || 0,
            status: status
        }
    }


    // action
    // lít brand
    service.action.listCategory = function (params) {
        let url = SiteUrl + '/rest/listCategory?' + $httpParamSerializer(params);
        return $http.get(url);
    }

    // selectListCategory
    service.action.selectListCategory = function () {
        let url = SiteUrl + '/rest/selectListCategory';
        return $http.get(url);
    }

    // create brand
    service.action.createCategory = function (params) {
        let url = SiteUrl + '/rest/createCategory';
        return $http.post(url, params);
    }


    return service;
});
