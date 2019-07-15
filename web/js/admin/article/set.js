;
var admin_article_set_ops = {
    init: function () {
        this.ue = null;
        this.eventBind();
        // this.initEditor();
        this.initMdEditor();
        common_ops.initpPluploadUploader(
            'cover_btn_big',
            common_ops.buildWww('/upload/plupload'),
            {bucket: $('input[name=bucket]').val()},
            false
        );
        common_ops.switchery(".is_top");
        common_ops.switchery(".is_original");
        common_ops.switchery(".status");

    },
    eventBind: function () {
        var that = this;

        that.admin_article_set_save(that);

        $("body").on("click", ".picture_delete", function () {
            common_ops.removePluploadPic($(this));
        });


    },
    admin_article_set_save: function (that) {
        var is_top_tmp = document.querySelector(".is_top"),
            is_original_tmp = document.querySelector(".is_original"),
            status_tmp = document.querySelector(".status"),
            clickButton = document.querySelector(".save");
        clickButton.addEventListener("click", function () {
            var btn_target = $(this);
            if (btn_target.hasClass("disabled")) {
                common_ops.alert("正在处理!!请不要重复提交");
                return;
            }

            var id = $(".admin_article_set_ops input[name=id]").val();

            var c_id_target = $(".admin_article_set_ops .c_id_select option:selected");
            var c_id = c_id_target.val();

            var keywords = [];
            $(".admin_article_set_ops input[name=keywords]").each(function () {
                if ($(this).parent("label").hasClass("active")) {
                    keywords.push($(this).val());
                }
            });

            if ($(".admin_article_set_ops .photos_area .item input").length > 1) {
                common_ops.alert("图片最多上传一张图片，请删除多余的图片提交!");
                return;
            }
            var pics = [];
            $(".admin_article_set_ops .photos_area .item input").each(function (index, value) {
                pics.push(value.value);
            });

            var title_target = $(".admin_article_set_ops input[name=title]");
            var title = title_target.val();

            var description_target = $(".admin_article_set_ops [name=description]");
            var description = description_target.val();

            var content = that.ue.getContent();

            var is_top = is_top_tmp.checked ? 1 : 0;
            var is_original = is_original_tmp.checked ? 1 : 0;
            var status = status_tmp.checked ? 1 : 0;

            if (c_id <= 0) {
                common_ops.alert("请选择分类");
                return
            }
            if (title.length < 1) {
                common_ops.tip("title不能为空", title_target);
                return;
            }

            btn_target.addClass("disabled");
            $.ajax({
                url: common_ops.buildAdmin("/article/set"),
                data: {
                    id: id,
                    c_id: c_id,
                    keywords: keywords,
                    pics: pics,
                    title: title,
                    description: description,
                    content: content,
                    is_top: is_top,
                    is_original: is_original,
                    status: status
                },
                type: "post",
                dataType: "json",
                success: function (res) {
                    btn_target.removeClass("disabled");
                    callback = null;
                    if (res.code == 200) {
                        callback = function () {
                            window.location.href = common_ops.buildAdmin("/article/index");
                        }
                    }
                    common_ops.alert(res.msg, callback);
                }
            })
        })
    },
    initEditor: function () {
        var that = this;
        that.ue = UE.getEditor('editor', {
            toolbars: [
                ['source', 'undo', 'redo', '|',
                    'bold', 'italic', 'underline', 'strikethrough', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', '|', 'rowspacingtop', 'rowspacingbottom', 'lineheight'],
                ['insertcode', 'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                    'directionalityltr', 'directionalityrtl', 'indent', '|',
                    'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                    'link', 'unlink'],
                ['imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                    'horizontal', 'spechars', '|', 'inserttable', 'deletetable', 'insertparagraphbeforetable'
                    , 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown'
                    , 'splittocells', 'splittorows', 'splittocols', 'preview', 'fullscreen']
            ],
            enableAutoSave: true,
            saveInterval: 60000,
            elementPathEnabled: false,
            zIndex: 4
        });
        that.ue.addListener('beforeInsertImage', function (t, arg) {
            console.log(t, arg);
            //alert('这是图片地址：'+arg[0].src);
            // that.ue.execCommand('insertimage', {
            //     src: arg[0].src,
            //     _src: arg[0].src,
            //     width: '250'
            // });
            return false;
        });
    },
    initMdEditor: function () {
        var editor = editormd("editor", {
            width: "74%",
            height: '740',
            autoHeight: true,
            // markdown: "xxxx",     // dynamic set Markdown text
            path : "/plugins/editor.md/lib/"  // Autoload modules mode, codemirror, marked... dependents libs path
        });
    }
};
$(document).ready(function () {
    admin_article_set_ops.init();
});