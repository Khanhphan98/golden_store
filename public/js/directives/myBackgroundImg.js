ngApp.directive('myBackgroundImg', function ($apply, $fileService) {
	var templateUrl = SiteUrl + "/modal/showImageModal";
	var link = function (scope) {

		scope.modalData;
		scope.modalDom;
		scope.checkPreview;
		scope.action = {
			getRequestFile: function (path) {
				try {
					if (path._file) {
						return path.url;
					} else {
						return $fileService.action.getRequestFileUrl(path.url);
					}

				} catch (error) {

				}

			},
		}

		scope.$watchCollection('showPreview', function (newVal, oldVal) {
			if (newVal == true) {
				scope.checkPreview = true;
			} else {
				scope.checkPreview = false;
			}
		})

		scope.$watch('singleImages', function (newVal, oldVal) {
			if (newVal) {
				$apply(function () {
					scope.modalData = newVal;
					if (newVal) {
						var re = /(?:\.([^.]+))?$/;
						var data = re.exec(newVal.fileName)[1];
						try {
							scope.ext = data.toLowerCase();

						} catch (error) {
							scope.ext = data;
						}
					}
				});
			}
		});
	};

	var restrict = 'E';
	var scope = {
		modalDom: '=',
		singleImages: '=singleImages',
		showPreview: '='
	};
	return {
		restrict: restrict,
		scope: scope,
		templateUrl: templateUrl,
		link: link
	}
})