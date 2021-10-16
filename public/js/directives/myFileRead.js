ngApp.directive("myFileRead", function ($apply) {
    return {
        scope: {
            myFileRead: "=",
            fileData: "="
        },
        link: function (scope, element, attributes) {
            element.bind("change", function (changeEvent) {
                var reader = new FileReader();
                reader.onload = function (loadEvent) {
                    $apply(function () {
                        scope.myFileRead = loadEvent.target.result;
                        scope.fileData = changeEvent.target.files[0];
                    });
                };
                reader.readAsDataURL(changeEvent.target.files[0]);
            });
        }
    };
});