var ngApp = angular.module('ngApp', ['bw.paging'], ['$httpProvider', function ($httpProvider) {
    $httpProvider.defaults.headers.post['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content');
}]);
