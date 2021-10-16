ngApp.directive('ngDom', function ($apply) {
   return {
       scope: {'ngDom': '='},
       link: function (scope, elem) {
           $apply(function () {
               scope.ngDom = elem[0];
           });
       }
   };
});