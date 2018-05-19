;
var admin_tag_edit_ops = {
    init: function () {
        this.eventBind();
    },
    eventBind: function () {
        var that = this;

        that.admin_tag_edit_save();
    },
    admin_tag_edit_save: function () {
        var clickCheckbox = document.querySelector(".toggle-switch"),
            clickButton = document.querySelector(".save");
        clickButton.addEventListener("click", function () {
            var status = clickCheckbox.checked ? 1 : 0;

            var id = $(".admin_tag_edit_ops input[name=id]").val();

            var name_target = $(".admin_tag_edit_ops input[name=name]");
            var name = name_target.val();
            if (name.length < 1) {
                common_ops.tip("请填写名称", name_target);
                return;
            }

            $.ajax({
                url: common_ops.buildAdmin("/tag/edit"),
                data: {
                    id: id,
                    name: name,
                    status: status
                },
                type: "post",
                dataType: "json",
                success: function (res) {
                    var callback = null;
                    if (res.code == 200) {
                        callback = function () {
                            window.location.href = common_ops.buildAdmin("/tag/index");
                        }
                    }
                    common_ops.alert(res.msg, callback);
                }
            });

        });
    }
};
$(document).ready(function () {
    admin_tag_edit_ops.init();
});

