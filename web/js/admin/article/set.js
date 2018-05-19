;
var admin_article_set_ops = {
    init: function () {
        this.ue = null;
        this.eventBind();
        this.initEditor();
    },
    eventBind: function () {
        var that = this;

        that.admin_article_set_save();
    },
    admin_article_set_save: function () {
        var clickCheckbox = document.querySelector(".toggle-switch"),
            clickButton = document.querySelector(".save");
        clickButton.addEventListener("click", function () {
            alert(clickCheckbox.checked);
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
};
$(document).ready(function () {
    admin_article_set_ops.init();
});