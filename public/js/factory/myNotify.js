ngApp.factory('$myNotify', ['$rootScope', function ($rootScope) {
        var myNotify = {
            
            success: function(message){
                var icon = 'fa fa-check';
                var container = 'floating';
                var time = 3000;
                var type = 'success';
                myNotify.showNotify(type, icon, message, container, time);
            },
            err: function(message){
                var icon = 'fa fa-ban';
                var container = 'floating';
                var time = 3000;
                var type = 'danger';
                myNotify.showNotify(type, icon, message, container, time);
            },
            showNotify: function(type, icon, message, container, time){
                $.niftyNoty({
                    type: type,
                    icon: icon,
                    message: message,
                    container: container,
                    timer: time
                });
            }
        };
        
        return myNotify;
}]);