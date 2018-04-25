;
var admin_account_set_ops = {
    init: function () {
        this.eventBind();
    },
    eventBind: function () {
        var that = this;
        $(".admin_account_set_ops .save").click(function () {

            var btn_target = $(this);
            if (btn_target.hasClass("disabled")) {
                common_ops.alert("111");
            }

            var nickname_target = $(".admin_account_set_ops input[name=nickname]");
            var nickname = nickname_target.val();

            var mobile_target = $(".admin_account_set_ops input[name=mobile]");
            var mobile = mobile_target.val();

            var email_target = $(".admin_account_set_ops input[name=email]");
            var email = email_target.val();

            var nickname_target = $(".admin_account_set_ops input[name=nickname]");
            var nickname = nickname_target.val();

            var login_name_target = $(".admin_account_set_ops input[name=login_name]");
            var login_name = login_name_target.val();

            var login_pwd_target = $(".admin_account_set_ops input[name=login_pwd]");
            var login_pwd = login_pwd_target.val();

            var status = $("input[name=status]").val();

            

        })
    }
};
$(document).ready(function () {
    admin_account_set_ops.init();
});