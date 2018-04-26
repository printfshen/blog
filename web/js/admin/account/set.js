;
var admin_account_set_ops = {
    init: function () {
        this.eventBind();
    },
    eventBind: function () {
        var that = this;

        var clickCheckbox = document.querySelector(".toggle-switch"),
            clickButton = document.querySelector(".save");
        clickButton.addEventListener("click", function () {
            var btn_target = $(this);
            if (btn_target.hasClass("disabled")) {
                common_ops.alert("正在处理!!请不要重复提交");
            }

            var status = 0;
            if (clickCheckbox.checked) {
                status = 1;
            }
            var nickname_target = $(".admin_account_set_ops input[name=nickname]");
            var nickname = nickname_target.val();

            var mobile_target = $(".admin_account_set_ops input[name=mobile]");
            var mobile = mobile_target.val();

            var email_target = $(".admin_account_set_ops input[name=email]");
            var email = email_target.val();

            var login_name_target = $(".admin_account_set_ops input[name=login_name]");
            var login_name = login_name_target.val();

            var login_pwd_target = $(".admin_account_set_ops input[name=login_pwd]");
            var login_pwd = login_pwd_target.val();

            if (!/^[\u4E00-\u9FA5A-Za-z0-9]{2,20}$/.test(nickname)) {
                common_ops.tip("昵称只支持中文、字母、数字的组合，2-20个字符", nickname_target);
                return;
            }
            if (!/^1[345678][0-9]{9}$/.test(mobile)) {
                common_ops.tip("请输入符合要求的手机号码", mobile_target);
                return;
            }
            if (!/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/.test(email)) {
                common_ops.tip("请输入符合要求的邮箱", email_target);
                return;
            }
            if (!/^[a-zA-z][a-zA-Z0-9]{5,20}$/.test(login_name)) {
                common_ops.tip("登陆名只支持字母开头和数字的组合，2-20个字符", login_name_target);
                return;
            }
            if (login_pwd.length < 5 || login_pwd.length > 20) {
                common_ops.tip("请输入5-20位的密码", login_pwd_target);
            }


        });
    }
};
$(document).ready(function () {
    admin_account_set_ops.init();
});