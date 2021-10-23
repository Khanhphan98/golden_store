ngApp.factory('$myFile', function ($rootScope, $httpParamSerializer, $typeConfig, $http) {
    var myFile = {
    	recordingAddress: '',
        avatar: function (file) {
            var params = {
                data: file
            };
            return url = SiteUrl + "/file/avatar?" + $httpParamSerializer(params);
        },

        fileAttachment: function (file,fileName) {
            var params = {
                data: file,
            };
             return url = SiteUrl + "/file/fileAttachment?" + $httpParamSerializer(params);
        },

        getFileAttachment: function (file,fileName) {
            var params = {
                data: file,
                fileName: fileName
            };
             return url = SiteUrl + "/file/getFileAttachment?" + $httpParamSerializer(params);
        },

        downloadFileAttachment: function (attachment, fileName) {
    	    let params = {
                attachment: attachment,
                fileName: fileName
            };
            return SiteUrl + "/rest/meeting/downloadAttachment?" + $httpParamSerializer(params);
        },

        confFile: function(file){
        	return myFile.recordingAddress + '/responseFile/file?data='+ file;
        },

        getRecordingFile: function (meeting_id, file_name) {
    	    let params = {
                meeting_id: meeting_id,
                file_name: file_name,
            }
            return SiteUrl + '/file/recording/download?' + $httpParamSerializer(params);
        }
    };
    return myFile;
});
