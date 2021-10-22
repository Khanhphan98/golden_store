ngApp.factory('$brandService', function ($rootScope, $http, $httpParamSerializer, $typeConfig) {
    var service = {
        action: {},
        data: {}
    };

    // data



    // action
    // lít brand
    service.action.listBrand = function () {
        let url = SiteUrl + '/rest/listBrand';
        return $http.get(url);
    }

    // create brand
    service.action.createBrand = function (params) {
        let url = SiteUrl + '/rest/createBrand';
        return $http.post(url, params);
    }


    return service;
});
