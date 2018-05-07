;
var admin_timeline_set_ops = {
    init: function () {
        this.eventBind();
        common_ops.initpPluploadUploader(
            'cover_btn_big',
            common_ops.buildWww('/upload/plupload'),
            {bucket: $('input[name=bucket]').val()},
            false
        );
    },
    eventBind: function () {
        var that = this;
        common_ops.datepicker($("#admin_timeline_date"));

        $("body").on("click", ".picture_delete", function () {
            common_ops.removePluploadPic($(this));
        });

        that.admin_timeline_set_sub();

    },
    admin_timeline_set_sub: function () {
        var clickCheckbox = document.querySelector(".toggle-switch"),
            clickButton = document.querySelector(".save");
        clickButton.addEventListener("click", function () {
            var btn_target = $(this);
            if (btn_target.hasClass("disabled")) {
                common_ops.alert("正在处理!!请不要重复提交");
                return
            }
            var id = $(".admin_timeline_set_ops input[name=id]").val();

            var status = clickCheckbox.checked ? 1 : 0;

            var title_target = $(".admin_timeline_set_ops input[name=title]");
            var title = title_target.val();

            var date_target = $(".admin_timeline_set_ops input[name=date]");
            var date = date_target.val();

            if ($(".photos_area .item input").length > 1) {
                common_ops.alert("图片最多上传一张图片，请删除多余的图片提交!");
                return;
            }
            var pics = [];
            $(".photos_area .item input").each(function (index, value) {
                pics.push($(value).val());
            });

            var content_target = $("#content");
            var content = content_target.val();
            if (content.length < 1) {
                common_ops.tip("请输入内容", content_target);
                return;
            }
            btn_target.addClass("disabled");
            $.ajax({
                url: common_ops.buildAdmin("/timeline/set"),
                data: {
                    id: id,
                    title: title,
                    date: date,
                    content: content,
                    pics: pics,
                    status: status
                },
                type: "post",
                dataType: "json",
                success: function (res) {
                    btn_target.removeClass("disabled");
                    var callback = null;
                    if (res.code == 200) {
                        callback = function () {
                            window.location.href = common_ops.buildAdmin("/timeline/index");
                        }
                    }
                    common_ops.alert(res.msg, callback);
                }
            })
        });
    }
};
$(document).ready(function () {
    admin_timeline_set_ops.init();
});