ngApp.directive('myDatepicker', function ($apply) {
    return {
        restrict: 'C',
        link: function (scope, element, attrs) {
            var curDatepicker = $(element[0]).datepicker({
                language: "vi",
                format: 'dd-mm-yyyy',
                todayHighlight: true,
                todayBtn: 1,
            });
            $(this).focusout();
            var curDate = "";
            curDatepicker.on('onclick', function (e) {
                $apply(function () {
                    curDate = curDatepicker.datepicker('getDate');
                    scope.date = moment(curDate).format("DD-MM-YYYY");
                    $(curDatepicker).datepicker('hide');
                });
            });
            curDatepicker.on('clearDate', function (e) {
                $apply(function () {
                    scope.date = '';
                });
            });

            scope.$watch('date', function (newVal, oldVal) {

                curDatepicker.on('newVal', function (e) {
                    curDatepicker.datepicker('setDate', newVal);
                    $(curDatepicker).datepicker('hide');

                });
            });

        },
        scope: {
            date: '=ngModel'
        }
    };
});