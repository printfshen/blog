;
var admin_tag_set_ops = {
    init: function () {
        this.eventBind();
        common_ops.tagsInput(
            $(".admin_tag_set_ops input[name=tags]")
        );
    },
    eventBind: function () {
        var that = this;
        that.admin_tag_set_save();
    },
    admin_tag_set_save: function () {
        $(".admin_tag_set_ops .save").click(function () {
            var btn_target = $(this);
            if (btn_target.hasClass("disabled")) {
                common_ops.alert("正在处理!!请不要重复提交");
                return;
            }

            var tags_target = $(".admin_tag_set_ops input[name=tags]");
            var tags = tags_target.val();
            if (tags.length < 1) {
                common_ops.tip("标签不能为空", tags_target);
            }

            btn_target.addClass("disabled");
            $.ajax({
                url: common_ops.buildAdmin("/tag/set"),
                data: {
                    tags: tags
                },
                type: "post",
                dataType: "json",
                success: function (res) {
                    btn_target.removeClass("disabled");
                    var callback = null;
                    if (res.code == 200) {
                        callback = function () {
                            window.location.href = common_ops.buildAdmin('/tag/index');
                        }
                    }
                    common_ops.alert(res.msg, callback);
                }
            })
        })
    }
};
$(document).ready(function () {
    admin_tag_set_ops.init();
});