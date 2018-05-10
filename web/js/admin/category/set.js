;
var admin_category_set_ops = {
    init: function () {
        this.eventBind();
        common_ops.select2Input(
            $(".admin_category_set_ops select[name=c_id]")
        );
        common_ops.tagsInput(
            $(".admin_category_set_ops input[name=keyword]")
        );
    },
    eventBind: function () {
        var that = this;
        that.admin_category_set_save();

    },
    admin_category_set_save: function () {
        var clickCheckbox = document.querySelector(".toggle-switch"),
            clickButton = document.querySelector(".save");
        clickButton.addEventListener("click", function () {
            var btn_target = $(this);
            if (btn_target.hasClass("disabled")) {
                common_ops.alert("正在处理!!请不要重复提交");
            }
            var status = clickCheckbox.checked ? 1 : 0;

            var id = $(".admin_category_set_ops input[name=id]").val();

            var f_id_target = $(".admin_category_set_ops select[name=f_id]");
            var f_id = f_id_target.val();

            var name_target = $(".admin_category_set_ops input[name=name]");
            var name = name_target.val();

            var description_target = $("#description");
            var description = description_target.val();

            var keyword_target = $(".admin_category_set_ops input[name=keyword]");
            var keyword = keyword_target.val();

            var sort_target = $(".admin_category_set_ops input[name=sort]");
            var sort = sort_target.val();

            if (name.length < 1) {
                common_ops.tip("请填写分类名称", name_target);
                return;
            }

            btn_target.addClass("disabled");
            $.ajax({
                url: common_ops.buildAdmin("/category/set"),
                data: {
                    id: id,
                    f_id: f_id,
                    name: name,
                    description: description,
                    keyword: keyword,
                    sort: sort,
                    status: status
                },
                type: "post",
                dataType: "json",
                success: function (res) {
                    btn_target.removeClass("disabled");
                    var callback = null;
                    if (res.code == 200) {
                        callback = function () {
                            window.location.href = common_ops.buildAdmin("/category/index");
                        }
                    }
                    common_ops.alert(res.msg, callback);
                }
            })
        });
    }

};
$(document).ready(function () {
    admin_category_set_ops.init();
});
