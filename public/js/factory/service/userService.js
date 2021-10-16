ngApp.factory('$userService', function ($rootScope, $http, $httpParamSerializer, $typeConfig) {
    var service = {
        action: {},
        data: {}
    };
    //chuan bi du lieu
    // service.data.list = function (keyword, role, page, perPage) {
    //     return {
    //         keyword: keyword,
    //         role: role || '',
    //         page: page,
    //         perPage: perPage
    //     };
    // };

    // service.action.sendOtpLdap = function (params) {
    //     var url = SiteUrl + '/sendOtpLdap?' + $httpParamSerializer(params);
    //     return $http.get(url);
    // };
    //
    // service.action.loginLdap = function (params) {
    //     var url = SiteUrl + '/loginLdap';
    //     return $http.post(url, params);
    // };


    // service.action.create = function (data) {
    //     var config = {
    //         headers: {
    //             'Content-Type': undefined,
    //             'processData': false,
    //             'contentType': false
    //         }
    //     };
    //     var url = SiteUrl + '/rest/user';
    //     return $http.post(url, data, config);
    // };




    // data
    //login
    service.data.login = function (email, password, rememberToken) {
        return {
            email: email,
            password: password,
            rememberToken: rememberToken
        }
    }

    //register
    service.data.register = function (name, phone, email, address, birthday, password, avatar, cover, status, is_admin) {
        return {
            name: name,
            phone: phone,
            email: email,
            address: address,
            birthday: birthday,
            password: password,
            avatar: avatar || '',
            cover: cover || '',
            status: status || 'AVAILABLE',
            is_admin: is_admin || 0
        }
    }


    // service.data.listUser = function (keyword, page, perPage, isAdmin, status, role, requestType) {
    //     return {
    //         keyword: keyword || null,
    //         page: page || null,
    //         perPage: perPage || null,
    //         isAdmin: isAdmin || null,
    //         status: status || null,
    //         role: role || null,
    //         requestType: requestType || null
    //     }
    // }
    //
    //
    // service.data.insertUpdateUser = function (department_id, area, name, display_name, account, rank, position, email, phone, status, location_id, avatar) {
    //     var params = new FormData();
    //     params.append('departmentId', department_id);
    //     params.append('area', area);
    //     params.append('name', name);
    //     params.append('displayName', display_name);
    //     params.append('account', account);
    //     params.append('rank', rank);
    //     params.append('position', position);
    //     params.append('email', email);
    //     params.append('phone', phone);
    //     params.append('status', status);
    //     params.append('locationId', location_id);
    //     params.append('isAdminUnit', '1');
    //     params.append('avatar', avatar);
    //     return params;
    // }
    //
    // // action

    service.action.login = function (params) {
        let url = SiteUrl + '/login';
        return $http.post(url, params);
    }

    service.action.register = function (params) {
        let url = SiteUrl + '/register';
        return $http.post(url, params);
    }

    // service.action.listRequestUser = function (data) {
    //     var url = SiteUrl + '/rest/user?' + $httpParamSerializer(data);
    //     return $http.get(url);
    // }
    //

    return service;
});


