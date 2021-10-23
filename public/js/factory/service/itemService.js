ngApp.factory('$itemService', function ($rootScope, $http, $httpParamSerializer, $typeConfig) {
    var service = {
        action: {},
        data: {}
    };

    // data

    //create item
    service.data.createItem = function (itemName, newPrice, oldPrice, size, countItems, category_id, brand, itemSex, itemNote, itemImage) {
        var params = new FormData();
        params.append('itemName', itemName);
        params.append('newPrice', newPrice);
        params.append('oldPrice', oldPrice || '');
        params.append('size', size || '');
        params.append('countItems', countItems || '');
        params.append('category_id', category_id || '');
        params.append('brand_id', brand || '');
        params.append('itemSex', itemSex || '');
        params.append('itemNote', itemNote || '');
        params.append('itemImage', itemImage || '');
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
        var config = {
            headers: {
                'Content-Type': undefined,
                'processData': false,
                'contentType': false
            }
        };
        var url = SiteUrl + '/rest/createItem';
        return $http.post(url, params, config);
    };


    service.action.listItem = function (params) {
        var url = SiteUrl + '/rest/listItem?' + $httpParamSerializer(params);
        return $http.get(url);
    }

    return service;
});


