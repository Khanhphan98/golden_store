ngApp.directive('ngFileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function (scope, element, attrs) {
            var model = $parse(attrs.ngFileModel);
            var isMultiple = attrs.multiple;
            var modelSetter = model.assign;
            element.bind('change', function () {
                var values = [];
                scope.imgFile = element[0].files;
                angular.forEach(element[0].files, function (item) {
                    var value = {
                        // File Name
                        name: item.name,
                        //File Size
                        size: item.size,
                        //File URL to view
                        url: URL.createObjectURL(item),
                        // File Input Value
                        _file: item
                    };
                    values.push(value);
                });
                scope.$apply(function () {
                    if (isMultiple) {
                        modelSetter(scope, values);
                        for (let i in values) {
                            let images = $('.images');
                            images.prepend('<div class="img" style="background-image: url(\'' + values[i].url + '\');" rel="'+ values[i].url +'"><span>remove</span></div>');
                            images.on('click', '.img',function(){
                                $(this).remove();
                            })
                        }
                    } else {
                        modelSetter(scope, values[0]);
                    }
                });
                document.getElementsByClassName("selectData").value = "";
                $('.selectData').val('');
            });
        }
    };
}]);
