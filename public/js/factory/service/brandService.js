ngApp.factory('$brandService', function ($rootScope, $http, $httpParamSerializer, $typeConfig) {
    var service = {
        action: {},
        data: {}
    };

    // data
    // list brand
    service.data.listBrand = (page, perPage, keyword) => {
        return {
            page: page || 1,
            perPage: perPage || 10,
            keyword: keyword || ''
        }
    }

    // create brand
    service.data.createBrand = (nameBrand, status, notes) => {
        return {
            nameBrand: nameBrand,
            status: status,
            notes: notes
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

    // delete brand
    service.action.deleteBrand = function (id) {
        let url = SiteUrl + '/rest/deleteBrand/' + id;
        return $http.delete(url);
    }

    // update brand
    service.action.updateBrand = function (params, idBrand) {
        let url = SiteUrl + '/rest/updateBrand/' + idBrand;
        return $http.put(url, params);
    }


    return service;
});
