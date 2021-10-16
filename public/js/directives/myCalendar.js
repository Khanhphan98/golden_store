ngApp.directive('myCalendar', function ($apply) {
    var link = function (scope, elm, attrs) {
        scope.domCalendar;
        scope.initCalendar = function (config) {
            $apply(function () {
                scope.calendar = $(scope.domCalendar).fullCalendar(config);
            });
        };

        scope.$watchCollection('config', function (newVal, oldVal) {
            if (scope.calendar) {
                var eventSources = newVal.eventSources;
                var oldEventSources = oldVal.eventSources;
                //xoa
                scope.calendar.fullCalendar('removeEventSources' );
                
                //them moi
                for(var key in eventSources)
                {
                    scope.calendar.fullCalendar('addEventSource', eventSources[key] );
                }
            }
            else {
                scope.initCalendar(newVal);
            }
        });
    };

    return {
        restrict: 'E',
        scope: {
            config: '=',
            calendar: '='
        },
        link: link,
        template: '<div ng-dom="domCalendar"></div>'
    }
})