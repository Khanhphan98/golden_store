ngApp.directive('myHeight', function() {
  return function(scope, element, attrs) {
    var maxh = 0;
    if (scope.$last) {
        element.find('.cat-panel').each(function() {
            h = $(this).height() + 60;
            if (h >= maxh){
                maxh = h;
            }
        });
        $('.cat-panel').height(maxh);
    }
  };
});