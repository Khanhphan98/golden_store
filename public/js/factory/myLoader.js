ngApp.factory('$myLoader', ['$rootScope', function ($rootScope) {
        var myLoader = {
            
            show: function(){
                $('#modalLoader').modal({
                    show: true,
                    backdrop: 'static'
                });
            },
            hide: function(){
                $('#modalLoader').modal('hide');
            }
        };
        
        return myLoader;
}]);