;
var admin_link_set_ops = {
    init: function () {
        this.eventBind();
        common_ops.initpPluploadUploader(
            'cover_btn_big',
            common_ops.buildWww('/upload/plupload'),
            {bucket: $('input[name=bucket]').val()},
            false
        );
        common_ops.switchery(".status");
    },
    eventBind: function () {
        var that = this;
        that.admin_link_set_save();

        $("body").on("click", ".picture_delete", function () {
            common_ops.removePluploadPic($(this));
        });
    },
    admin_link_set_save: function () {
        var status_tmp = document.querySelector(".status"),
            clickButton = document.querySelector(".save");
        clickButton.addEventListener("click", function () {
            var btn_target = $(this);
            if (btn_target.hasClass("disabled")) {
                common_ops.alert("正在处理!!请不要重复提交");
                return;
            }

            var id = $(".admin_link_set_ops input[name=id]").val();

            var title_target = $(".admin_link_set_ops input[name=title]");
            var title = title_target.val();

            var url_target = $(".admin_link_set_ops input[name=url]");
            var url = url_target.val();

            var status = status_tmp.checked ? 1 : 0;

            var sort_target = $(".admin_link_set_ops input[name=sort]");
            var sort = sort_target.val();

            var remark_target = $(".admin_link_set_ops #remark");
            var remark = remark_target.val();

            if (title.length < 1) {
                common_ops.tip("title不能为空", title_target);
                return;
            }
            if (url.length < 1) {
                common_ops.tip("Url不能为空", title_target);
                return;
            }

            if ($(".admin_link_set_ops .photos_area .item input").length > 1) {
                common_ops.alert("图片最多上传一张图片，请删除多余的图片提交!");
                return;
            }
            var pics = [];
            $(".admin_link_set_ops .photos_area .item input").each(function (index, value) {
                pics.push(value.value);
            });

            btn_target.addClass("disabled");
            $.ajax({
                url: common_ops.buildAdmin("/link/set"),
                data: {
                    id: id,
                    title: title,
                    url: url,
                    pic: pics,
                    remark: remark,
                    status: status,
                    sort: sort
                },
                type: "post",
                dataType: "json",
                success: function (res) {
                    var callback = null;
                    if (res.code == 200) {
                        callback = function () {
                            window.location.href = common_ops.buildAdmin("/link/index");
                        }
                    }
                    common_ops.alert(res.msg, callback)
                }
            })
            btn_target.removeClass("disabled");
        })
    }
};
$(document).ready(function () {
    admin_link_set_ops.init()
});