ngApp.directive('ngFile', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            element.bind('change', function(){
                $parse(attrs.ngFile).assign(scope,element[0].files)
                let model = $parse(attrs.ngFile);
                let isMultiple = attrs.multiple;
                let modelSetter = model.assign;

                let values = [];
                scope.imgFile = element[0].files;
                angular.forEach(element[0].files, function (item) {
                    let value = {
                        // File Name
                        name: item.name,
                        //File Size
                        size: item.size,
                        //File URL to view
                        url: URL.createObjectURL(item),
                        // File Input Value
                        _file: item
                    }
                    values.push(value);
                })
                scope.$apply(function () {
                    if (isMultiple) {
                        for (let i in values) {
                            let images = $('.images');
                            images.prepend('<div class="img" style="background-image: url(\'' + values[i].url + '\');" rel="'+ values[i].url +'"><span>remove</span></div>');
                            images.on('click', '.img',function(){
                                $(this).remove();
                            })
                        }
                    }
                });
            });
        }
    };
}]);
