ngApp.factory('$myNotifies', ['$rootScope', function ($rootScope, $scope) {
    var $myNotifies = {
        alert: function(message, notify){
            $myNotifies.showNotify(message, notify);
        },
        success: function(message, notify){
            let classes = 'alert-success';
            let position = 'right';
            $myNotifies.showNotify(message, classes, position, notify);
        },
        error: function(message, notify){
            let classes = 'alert-danger';
            let position = 'right';
            $myNotifies.showNotify(message, classes, position, notify);
        },
        showNotify: function(message, classes, position, notify){
            notify({
                message: message,
                classes: classes,
                position: position,
                scope: $scope,
            });
        }

    };

    return $myNotifies;
}]);
