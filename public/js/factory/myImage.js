ngApp.factory('$myImage', function ($rootScope, $myConfig) {
    var myImage = {
        
        showAvatar: function (url, gender) {
            var retVal = url;
            if (!url)
            {
                retVal = SiteUrl + '/images/new-user-image-default.png';
            }
            return retVal;
        }
    };
    return myImage;
});