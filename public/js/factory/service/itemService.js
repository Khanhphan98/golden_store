ngApp.factory('$itemService', function ($rootScope, $http, $httpParamSerializer, $typeConfig) {
    var service = {
        action: {},
        data: {}
    };

    // data

    //create item
    service.data.createItem = function (itemName, newPrice, oldPrice, size, countItems, category, brand, itemSex, itemNote, itemImage) {
        var params = new FormData();
        params.append('itemName', itemName);
        params.append('newPrice', newPrice);
        params.append('oldPrice', oldPrice || '');
        params.append('size', size || '');
        params.append('countItems', countItems || '');
        params.append('category', category || '');
        params.append('brand', brand || '');
        params.append('itemSex', itemSex || '');
        params.append('itemNote', itemNote || '');
        params.append('itemImage', itemImage || '');
        return params;
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


    service.action.listItem = function () {
        var url = SiteUrl + '/rest/listItem';
        return $http.get(url);
    }

    return service;
});


