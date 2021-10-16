ngApp.directive('myRadio', function ($apply) {
    return {
        restrict: 'C',
        link: function (scope, element, attrs) {
            var radioCheck = $(element[0]).radio;
        },
        scope: {
        }
    };
});