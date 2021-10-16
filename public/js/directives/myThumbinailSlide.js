ngApp.directive('myThumbinailSlide', function ($apply, $fileService) {
	var templateUrl = SiteUrl + "/modal/myThumbinailSlide";

	var link = function (scope) {
		scope.slides = [];

		scope.thumbnailSize = 5;
		scope.thumbnailPage = 1;
		scope.modalFile;

		scope.$watchCollection('thumbinalSlide', function (newVal, oldVal) {
			if (newVal) {
				scope.slides = newVal;
				scope.showThumbnails = scope.slides.slice((scope.thumbnailPage - 1) * scope.thumbnailSize, scope.thumbnailPage * scope.thumbnailSize);
			}
		});
		// scope.$watchCollection('imgData', function (newVal, oldVal) {
		// 	scope.showThumbnails = newVal.slice((scope.thumbnailPage - 1) * scope.thumbnailSize, scope.thumbnailPage * scope.thumbnailSize);
		// });
		scope.action = {
			prevPageThumbinails: function () {
				if (scope.thumbnailPage > 1) {
					scope.thumbnailPage--;
				}
				scope.showThumbnails = scope.slides.slice((scope.thumbnailPage - 1) * scope.thumbnailSize, scope.thumbnailPage * scope.thumbnailSize);
				scope.limitLength = false;

			},

			nextPageThumbinails: function () {
				if (scope.thumbnailPage <= Math.floor(scope.slides.length / scope.thumbnailSize)) {
					scope.thumbnailPage++;
					scope.limitLength = true;

				}
				scope.showThumbnails = scope.slides.slice((scope.thumbnailPage - 1) * scope.thumbnailSize, scope.thumbnailPage * scope.thumbnailSize);

				var checkOdd = scope.slides.length % scope.thumbnailSize;
				var checkLength = Math.floor(scope.slides.length / scope.thumbnailSize);

				if (checkOdd > 0) {
					checkLength++;
				}

				if (scope.thumbnailPage == checkLength) {
					scope.limitLength = true;
				} else {
					scope.limitLength = false;
				}
			},
			checkExtension: function (fileName) {
				var re = /(?:\.([^.]+))?$/;
				var extension = re.exec(fileName)[1];
				try {
					extension = extension.toLowerCase();

				} catch (error) {

				}
				return extension;
			},
			showModal: function (data) {
				scope.fileModal = data;
				$(scope.modalFile).modal('show');
				// body...
			},
            getRequestFile: function (path) {
                return $fileService.action.getRequestFileUrl(path);
            },
		}
	}
	return {
		restrict: 'E',
		scope: {
			thumbinalSlide: "=",
		},
		link: link,
		templateUrl: templateUrl
	}
})
