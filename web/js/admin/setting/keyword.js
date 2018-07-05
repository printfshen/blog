;
var admin_setting_keyword = {
    init: function () {
        this.eventBind();
        common_ops.tagsInput($("#keyword"), 250);
    },
    eventBind: function () {
        var that = this;

        that.admin_setting_keyword_save();
    },
    admin_setting_keyword_save: function () {
        $(".admin_setting_keyword .save").click(function () {
            var btn_target = $(this);
            if (btn_target.hasClass("disabled")) {
                common_ops.alert("正在处理!!请不要重复提交");
                return;
            }
            var keywords = $("#keyword").val();

            btn_target.addClass("disabled");
            $.ajax({
                url: common_ops.buildAdmin("/setting/keyword"),
                data: {
                    keywords: keywords
                },
                type: "post",
                dataType: "json",
                success: function (res) {
                    btn_target.removeClass("disabled")
                    var callback = null
                    if (res.code == 200) {
                        callback = function () {
                            window.location.href = common_ops.buildAdmin("/setting/keyword");
                        }
                    }
                    common_ops.alert(res.msg, callback)
                }
            })
        })
    }
};
$(document).ready(function () {
    admin_setting_keyword.init()
});