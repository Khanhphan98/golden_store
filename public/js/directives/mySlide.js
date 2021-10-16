ngApp.directive('mySlide', function ($apply, $location, $fileService) {
	var templateUrl = SiteUrl + "/modal/myBackgroundImgModal";


	var link = function (scope) {
		scope.imgData = [];
		scope.currentKey;
		scope.showHide;
		scope.modalDom;
		scope.singleImages;
		scope.currentImage;
		scope.dataFile = [];

		scope.filePersonalDelete = [];
		scope.canDelete;
		scope.showPreview;

		// thumbnail
		scope.thumbnailSize = 5;
		scope.thumbnailPage = 1;
		scope.$watchCollection('checkShowFilePreview', function (newVal, oldVal) {
			if (newVal == true) {
				scope.showPreview = true;
			} else {
				scope.showPreview = false;
			}
		})
		scope.$watchCollection('canDeleteRequest', function (newVal, oldVal) {
			if (newVal == false) {
				scope.canDelete = newVal;
			} else {
				scope.canDelete = true;

			}
		})

		scope.$watchCollection('slideFile', function (newVal, oldVal) {
			try {
				if (newVal.length) {
					scope.showHide = true;

					if (newVal.length > 0) {
						scope.showHide = true;

						var arrFileExtra = [];

						for (var i = 0; i < newVal.length; i++) {
							arrFileExtra.push({
								url: newVal[i].fileUrl,
								fileName: newVal[i].fileName,
								filePath: newVal[i].fileUrl,
							})
						}
						scope.imgData = arrFileExtra;
						scope.currentImage = scope.imgData[0];
						scope.showHide = true;
					}
				}
			}
			catch (err) {
			}
		});

		scope.$watch('data', function (newVal, oldVal) {
			if (newVal) {
				if (newVal.length > 0) {
					for (var i in newVal) {
						scope.imgData.push(newVal[i])
						scope.currentImage = scope.imgData[0];
					}
					scope.showHide = true;
					scope.action.callCtroller(scope.imgData);

				} else {
					scope.showHide = false;
				}
			}
		});

		scope.$watchCollection('imgData', function (newVal, oldVal) {
			scope.showThumbnails = newVal.slice((scope.thumbnailPage - 1) * scope.thumbnailSize, scope.thumbnailPage * scope.thumbnailSize);
		});

		scope.action = {
			getRequestFile: function (path) {
				if (path._file) {
					return path.url;
				} else {
					return $fileService.action.getRequestFileUrl(path.url);
				}
			},

			callCtroller: function (key) {
				// file của khách hàng cá nhân + kh cá nhân tổ thuộc tổ chức
				scope.idCardFile({ data: key });
				scope.organizationFile({ data: key });

				// file của khách hàng doanh nghiệp
				scope.licenseFile({ data: key });
				scope.representativeFile({ data: key });

				scope.registrationFile({ data: key });
				scope.confirmationFile({ data: key });

				scope.getFileRegistration({ data: key });
			},

			callDeleteFIle: function (imgDelete) {

			},

			remove: function (data, id) {
				// lấy filePath của phần tử bị xóa

				if (data.filePath) {
					scope.filePersonalDelete.push({
						filePath: data.filePath,
					})
				} else {
					scope.filePersonalDelete.push({
						fileDeleteLocal: data.name,
					})
				}

				// thực hiện cắt mảng
				scope.imgData.splice(id, 1);

				if (scope.currentImage == data) {
					if (id < Object.keys(scope.imgData).length - 1) {
						scope.currentImage = scope.imgData[id];
					} else {
						scope.currentImage = scope.imgData[0];
					}
				}

				scope.action.callCtroller(scope.imgData);
				scope.action.callDeleteFIle(scope.filePersonalDelete);

				// khi xóa hết mảng
				if (scope.imgData.length > 0) {
					scope.showHide = true;
				} else {
					scope.showHide = false;
				}

			},
			showModal: function (image) {
				scope.singleImages = image;
				$(scope.modalDom).modal('show');
			},
			prevSlide: function () {

				if (scope.currentKey > 0) {
					scope.currentKey--;
				} else {
					scope.currentKey = Object.keys(scope.imgData).length - 1;
				}
				scope.currentImage = scope.imgData[scope.currentKey];
			},

			nextSlide: function () {

				if (scope.currentKey < Object.keys(scope.imgData).length - 1) {
					scope.currentKey++;
				} else {
					scope.currentKey = 0;
				}

				scope.currentImage = scope.imgData[scope.currentKey]
			},


			prevPageThumbinails: function () {
				if (scope.thumbnailPage > 1) {
					scope.thumbnailPage--;
				}
				scope.showThumbnails = scope.imgData.slice((scope.thumbnailPage - 1) * scope.thumbnailSize, scope.thumbnailPage * scope.thumbnailSize);
				scope.limitLength = false;

			},

			nextPageThumbinails: function () {
				if (scope.thumbnailPage <= Math.floor(scope.imgData.length / scope.thumbnailSize)) {
					scope.thumbnailPage++;
				}
				scope.showThumbnails = scope.imgData.slice((scope.thumbnailPage - 1) * scope.thumbnailSize, scope.thumbnailPage * scope.thumbnailSize);

				var checkOdd = scope.imgData.length % scope.thumbnailSize;
				var checkLength = Math.floor(scope.imgData.length / scope.thumbnailSize);

				if (checkOdd > 0) {
					checkLength++;
				}

				if (scope.thumbnailPage == checkLength) {
					scope.limitLength = true;
				} else {
					scope.limitLength = false;
				}
			},
			/**
			 * chọn slide hiển thị
			 * @param {} data 
			 */
			getCurSlide: function (data) {
				scope.currentImage = data;
			},

			/**
			 * kiểm tra đuôi 
			 * @param {*} fileName 
			 */
			checkExtension: function (fileName) {
				var re = /(?:\.([^.]+))?$/;
				var extension = re.exec(fileName)[1];
				try {
					extension = extension.toLowerCase();

				} catch (error) {

				}
				return extension;
			},
		}

	};

	return {
		restrict: 'E',
		scope: {
			data: "=blobImage",
			slideFile: "=",
			canDeleteRequest: "=",
			idCardFile: "&",
			organizationFile: "&",

			// doanh nghiệp
			licenseFile: "&",
			representativeFile: "&",

			registrationFile: "&",
			confirmationFile: "&",


			checkShowFilePreview: "=",
			getFileRegistration: '&'

		},
		link: link,
		templateUrl: templateUrl
	}
})