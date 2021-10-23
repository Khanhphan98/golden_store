ngApp.factory('$typeConfig', function ($rootScope, $http, $httpParamSerializer) {
    var typeConfig = {
        listMonthView: {
            '1': {
                displayView: 'January',
                value: 31,
                month: 1
            },
            '2': {
                displayView: 'February',
                value: 28,
                month: 2
            },
            '3': {
                displayView: 'March',
                value: 31,
                month: 3
            },
            '4': {
                displayView: 'April',
                value: 30,
                month: 4
            },
            '5': {
                displayView: 'May',
                value: 31,
                month: 5
            },
            '6': {
                displayView: 'June',
                value: 30,
                month: 6
            },
            '7': {
                displayView: 'July',
                value: 31,
                month: 7
            },
            '8': {
                displayView: 'August',
                value: 31,
                month: 8
            },
            '9': {
                displayView: 'September',
                value: 30,
                month: 9
            },
            '10': {
                displayView: 'October',
                value: 31,
                month: 10
            },
            '11': {
                displayView: 'November',
                value: 30,
                month: 11
            },
            '12': {
                displayView: 'December',
                value: 31,
                month: 12
            },
        },
        listDayView: {
            '1': {
                displayView: 'Thứ 2'
            },
            '2': {
                displayView: 'Thứ 3'
            },
            '3': {
                displayView: 'Thứ 4'
            },
            '4': {
                displayView: 'Thứ 5'
            },
            '5': {
                displayView: 'Thứ 6'
            },
            '6': {
                displayView: 'Thứ 7'
            },
            '7': {
                displayView: 'Chủ nhật'
            }
        },
        typePassword: {
            show: 'text',
            hide: 'password'
        },
        configStatus: {
            '0': 'Hoạt động',
            '1': 'Tạm dừng'
        },
        configSex: {
            0: 'Nam',
            1: 'Nữ'
        },
        configSize: {
            0: {
                sizeName: 'Size S',
                value: 8,
            },
            1: {
                sizeName: 'Size M',
                value: 9,
            },
            2: {
                sizeName: 'Size L',
                value: 10,
            },
            3: {
                sizeName: 'Size Xl',
                value: 11,
            },
            4: {
                sizeName: 'Size XXl',
                value: 12,
            },


        }
    };

    return typeConfig;
});
