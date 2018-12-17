;
var admin_setting_index_ops = {
    init: function () {
        this.eventBind()
        common_ops.switchery(".status");
        common_ops.initpPluploadUploader(
            'cover_btn_big',
            common_ops.buildWww('/upload/plupload'),
            {bucket: $('input[name=bucket]').val()},
            false
        );
    },
    eventBind: function () {
        var that = this

        $("body").on("click", ".picture_delete", function () {
            common_ops.removePluploadPic($(this));
        });

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

            var WebICP_target = $(".admin_setting_index_ops input[name=WebICP]");
            var WebICP = WebICP_target.val();

            var WebMasterName_target = $(".admin_setting_index_ops input[name=WebMasterName]")
            var WebMasterName = WebMasterName_target.val()

            if ($(".admin_setting_index_ops .photos_area .item input").length > 1) {
                common_ops.alert("图片最多上传一张图片，请删除多余的图片提交!");
                return;
            }
            var WebMasterAvatar = [];
            $(".admin_setting_index_ops .photos_area .item input").each(function (index, value) {
                WebMasterAvatar = value.value;
            });

            var WebMasterSkill_target = $(".admin_setting_index_ops input[name=WebMasterSkill]")
            var WebMasterSkill = WebMasterSkill_target.val()

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
                    WebMasterName: WebMasterName,
                    WebMasterAvatar: WebMasterAvatar,
                    WebMasterSkill: WebMasterSkill,
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
