ngApp.directive('myUploadFile', function ($rootScope, $myFunc) {
    var link = function (scope, element, attr) {
        var dropzone = {};
        var createDropZone = function (paramName) {
            dropzone = new Dropzone(element[0], scope.config);
            angular.forEach(scope.setEvent, function (handler, event) {
                dropzone.on(event, handler);
            });
            scope.method = {
                getAcceptedFiles: function () {
                    return dropzone.getAcceptedFiles();
                },
                getRejectedFiles: function () {
                    return dropzone.getRejectedFiles();
                },
                getQueuedFiles: function () {
                    return dropzone.getQueuedFiles();
                },
                getUploadingFiles: function () {
                    return dropzone.getQueuedFiles();
                },
                removeAllFiles: function(){
                    return dropzone.removeAllFiles();
                }
            };
        }
        scope.$watchCollection('config', function (newVal, oldVal) {
            if (!$myFunc.isEmpty(newVal)) {
                createDropZone(newVal);
            }
        });
    };
    return {
        restrict: 'C',
        link: link,
        scope: {
            method: '=?',
            config: '=',
            setEvent: '='
        }
    }
});