ngApp.directive('myDropzone', function ($apply) {
    var link = function (scope, element, attrs) {

        scope.data = {
            loadDropzone: function () {
                scope.dropzone = new Dropzone(element[0], scope.config.options);
                angular.forEach(scope.config.eventHandlers, function (handler, event) {
                    scope.dropzone.on(event, handler);
                });
            }
        };
        scope.$watchCollection('config', function (newVal, oldVal) {
            scope.data.loadDropzone();
        });
    }
    return {
        restrict: 'C',
        scope: {
            dropzone: '=ngModel',
            config: '=config'
        },
        link: link
    }
});