ngApp.directive('imageResize', function (dateFilter, $apply) {
    return {
        restrict: 'A',
        link: function (scope, elm, attrs, ctrl) {
            $apply(function () {
                var str = attrs['imageResize'];
                var arr = str.split('/');
                $(elm).height(($(elm).width() * arr[1]) / arr[0]);
            }, 1000);
        }
    };
});