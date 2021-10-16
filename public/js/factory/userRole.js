ngApp.factory('$userRole', function ($rootScope, $http, $httpParamSerializer)
{
    var userRole = {
        CONST_ROLE_USER: 'USER',
        CONST_ROLE_MONITOR: 'MONITOR',
        CONST_ROLE_MANAGER: 'MANAGER',
        checkIsSuperAdmin: function(){
            return parseInt(curUserInfo.is_admin) ? true: false;
        },
        checkRole: function(role){
            return arrUserRole.indexOf(role) < 0? false: true;
        },
        getListRoleCurUser: function(){
            return arrUserRole;
        },
        isCurUser: function(id){
            return (id == curUserInfo.id)? true: false;
        },
        getRoleName: function (role) {
            var retVal = false;
            switch(role){
                case this.CONST_ROLE_USER:
                    retVal = 'Người dùng';
                    break;
                case this.CONST_ROLE_MONITOR:
                    retVal = 'Người điều hành';
                    break;
                case this.CONST_ROLE_MANAGER:
                    retVal = 'Quản lý';
                    break;
            }
            
            return retVal;
        },
        getCurUserInfo: function(){
            return curUserInfo;
        }
    };
    
    return userRole;
});