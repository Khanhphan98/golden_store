ngApp.directive('stringToNumber', function () {
    return {
        restrict: 'A',
        require: 'ngModel',
        link: function (scope, element, attrs, ngModel) {
            ngModel.$parsers.push(function (value) {
                return value;
            });
            ngModel.$formatters.push(function (value) {
                return parseInt(value);
            });
        }
    };
});