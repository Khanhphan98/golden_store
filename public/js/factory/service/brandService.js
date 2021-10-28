ngApp.factory('$brandService', function ($rootScope, $http, $httpParamSerializer, $typeConfig) {
    var service = {
        action: {},
        data: {}
    };

    // data
    service.data.listBrand = (page, perPage, keyword) => {
        return {
            page: page || 1,
            perPage: perPage || 10,
            keyword: keyword || ''
        }
    }


    // action
    // lít brand
    service.action.listBrand = function (params) {
        let url = SiteUrl + '/rest/listBrand?' + $httpParamSerializer(params);
        return $http.get(url);
    }

    // create brand
    service.action.createBrand = function (params) {
        let url = SiteUrl + '/rest/createBrand';
        return $http.post(url, params);
    }



    return service;
});
