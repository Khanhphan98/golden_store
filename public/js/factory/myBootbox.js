ngApp.factory('$myBootbox', ['$rootScope', function ($rootScope) {
        var myBootbox = {
            confirm: function(message, callBack){
                callBack = callBack || function(){};
                bootbox.confirm({ 
                    message: message, 
                    callback: callBack
                });
            },
            alert: function(message, callBack){
                callBack = callBack || function(){};
                bootbox.confirm({
                    message: message, 
                    callback: callBack
                });
            },
            prompt: function(title, callBack){
                callBack = callBack || function(){};
                bootbox.prompt({
                    title: title, 
                    callback: callBack
                });
            },
            
            confirmLogin: function(message, callBack) {
                callBack = callBack || function(){};
                bootbox.confirm({ 
                    message: message, 
                    buttons: {
                        'cancel': {
                            label: 'Thử lại',
                            className: 'btn-default'
                        },
                        'confirm': {
                            label: 'Nhập mã xác nhận',
                            className: 'btn-primary'
                        }
                    },
                    callback: callBack
                });
            }
        };
        
        return myBootbox;
}]);