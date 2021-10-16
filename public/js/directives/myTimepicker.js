ngApp.directive('myTimepicker', function($apply) {
    return {
        restrict: 'C',
        link: function(scope, element, attrs) {
            var curTimepicker = $(element[0]).timepicker(scope.option);
            curTimepicker.on('changeTime.timepicker', function(e) {
                $apply(function(){
                    scope.time = e.time.value;
                });
            });
            
            scope.$watch('time', function(newVal, oldVal){
                if(moment(newVal, 'h:mm A').format('h:mm:ss') != moment(oldVal, 'h:mm A').format('h:mm:ss')){
                    curTimepicker.timepicker('setTime', newVal);
                }
            });
        },
        scope: {
            time: '=ngModel',
            option: '='
        }
    };
});