;
var admin_setting_index_ops = {
    init: function () {
        this.eventBind()
        common_ops.switchery(".status");
    },
    eventBind: function () {
        var that = this
        that.admin_setting_index_save()
    },
    admin_setting_index_save: function () {
        var clickCheckbox = document.querySelector(".status"),
            clickButton = document.querySelector(".save");
        clickButton.addEventListener("click", function () {
            var btn_target = $(this);
            if (btn_target.hasClass("disabled")) {
                common_ops.alert("正在处理!!请不要重复提交");
                return;
            }
            var status = clickCheckbox.checked ? 1 : 0;

            var WebName_target = $(".admin_setting_index_ops input[name=WebName]");
            var WebName = WebName_target.val();

            var WebKeyWords_target = $("#WebKeyWords");
            var WebKeyWords = WebKeyWords_target.val();

            var WebDescription_target = $("#WebDescription");
            var WebDescription = WebDescription_target.val();

            var WebICP_target = $(".admin_setting_index_ops input[name=WebName]");
            var WebICP = WebICP_target.val();

            var WebEmail_target = $(".admin_setting_index_ops input[name=WebEmail]");
            var WebEmail = WebEmail_target.val();

            var WebCopyright_target = $(".admin_setting_index_ops input[name=WebCopyright]");
            var WebCopyright = WebCopyright_target.val();

            var WebMessage_target = $("#WebMessage");
            var WebMessage = WebMessage_target.val();

            btn_target.addClass("disabled");
            $.ajax({
                url: common_ops.buildAdmin("/setting/index"),
                data: {
                    WebName: WebName,
                    WebKeyWords: WebKeyWords,
                    WebDescription: WebDescription,
                    WebICP: WebICP,
                    WebEmail: WebEmail,
                    WebCopyright: WebCopyright,
                    WebMessage: WebMessage,
                    WebStatus: status
                },
                type: "post",
                dataType: "json",
                success: function (res) {
                    btn_target.removeClass("disabled");
                    var callback = null;
                    if (res.code == 200) {
                        callback = function () {
                            window.location.href = common_ops.buildAdmin("/setting/index");
                        }
                    }
                    common_ops.alert(res.msg, callback);
                }
            })
        })
    }
}
$(document).ready(function () {
    admin_setting_index_ops.init()
})
