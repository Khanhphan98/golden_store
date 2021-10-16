ngApp.factory('$myFile', function ($rootScope, $httpParamSerializer, $settingService, $typeConfig, $http) {
    var myFile = {
    	recordingAddress: '',
        avatar: function (file) {
            var params = {
                data: file
            };
            return url = SiteUrl + "/file/avatar?" + $httpParamSerializer(params);
        },
        getSettingConf: function () {
        	$settingService.action.info($typeConfig.CONST_SETTING_PEXIP).then(function(resData){
                var value = JSON.parse(resData.data[0].value);
                myFile.recordingAddress = value.recordingAddress;
        	}).catch(function(err){
        		/*console.log(err);*/
        	});
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
    myFile.getSettingConf();
    return myFile;
});