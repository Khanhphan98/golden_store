ngApp.factory('$itemService', function ($rootScope, $http, $httpParamSerializer, $typeConfig) {
    var service = {
        action: {},
        data: {}
    };

    // data

    //create item
    service.data.createItem = function (itemName, newPrice, oldPrice, size, countItems,
                                        category_id, brand_id, itemSex, itemNote, itemImage, status) {
        let params = new FormData();
        params.append('itemName', itemName);
        params.append('newPrice', newPrice);
        params.append('oldPrice', oldPrice || '');
        params.append('size', size || '');
        params.append('countItems', countItems || '');
        params.append('category_id', category_id || '');
        params.append('brand_id', brand_id || '');
        params.append('itemSex', itemSex || '');
        params.append('itemNote', itemNote || '');
        angular.forEach(itemImage, function(images){
            params.append('itemImage[]', images || '');
        });
        params.append('status', status || '0');
        return params;
    }
    service.data.listItem = function (page, perPage, keyword) {
        return {
            page: page || 1,
            perPage: perPage || 10,
            keyword: keyword || ''
        }
    }


    // action

    // create item
    service.action.createItem = function (params) {
        let config = {
            headers: {
                'Content-Type': undefined,
                'processData': false,
                'contentType': false
            }
        };
        let url = SiteUrl + '/rest/createItem';
        return $http.post(url, params, config);
    };


    service.action.listItem = function (params) {
        let url = SiteUrl + '/rest/listItem?' + $httpParamSerializer(params);
        return $http.get(url);
    }

    service.action.listItems = function () {
        let url = SiteUrl + '/render/listItems';
        return $http.get(url);
    }

    return service;
});


