ngApp.factory('$apply', ['$rootScope', function ($rootScope) {
        return function (fn) {
            setTimeout(function () {
                $rootScope.$apply(fn);
            });
        };
}]);