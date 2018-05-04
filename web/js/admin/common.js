;
var common_ops = {
    init: function () {
        this.eventBind();
    },
    eventBind: function () {
        var that = this;


    },
    buildAdmin: function (path, params) {
        var url = "/admin" + path;
        var _paramUrl = "";
        if (params) {
            _paramUrl = Object.keys(params).map(function (t) {
                return [encodeURIComponent(k), encodeURIComponent(params[k])].join("=");
            }).join("&");
        }
        return url + _paramUrl;
    },
    buildWww: function (path, params) {
        var url = path;
        var _paramUrl = "";
        if (params) {
            _paramUrl = Object.keys(params).map(function (t) {
                return [encodeURIComponent(k), encodeURIComponent(params[k])].join("=");
            }).join("&");
        }
        return url + _paramUrl;
    },
    buildPicUrl: function (bucket, img_key) {
        var upload_config = eval('(' + $(".hidden_layout_warp input[name=upload_config]").val() + ')');
        var domain = "http://" + window.location.hostname;
        return domain + upload_config[bucket] + "/" + img_key;
    },
    alert: function (msg, cb) {
        layer.alert(msg, {
            yes: function (index) {
                if (typeof cb == "function") {
                    cb();
                }
                layer.close(index);
            }
        })
    },
    confirm: function (msg, callback) {
        callback = ( callback != undefined ) ? callback : {'ok': null, 'cancel': null};
        layer.confirm(msg, {
            btn: ['确定', '取消'] //按钮
        }, function (index) {
            //确定事件
            if (typeof callback.ok == "function") {
                callback.ok();
            }
            layer.close(index);
        }, function (index) {
            //取消事件
            if (typeof callback.cancel == "function") {
                callback.cancel();
            }
            layer.close(index);
        });
    },
    tip: function (msg, target) {
        layer.tips(msg, target, {
            tips: [3, "#75717a"]
        });
        $("html, body").animate({
            scrollTop: target.offset().top - 10
        }, 100);
    },
    msg: function (msg) {
        layer.msg(msg);
    },
    index_search_sub: function () {
        $('#index_search_form .search').click(function () {
            $("#index_search_form").submit();
        })
    },
    initpPluploadUploader: function (buttonId, url, params, selection) {
        var uploader = new plupload.Uploader({
            runtimes: 'gears,html5,html4,silverlight,flash',
            browse_button: buttonId,
            url: url,
            flash_swf_url: 'plupload/Moxie.swf',
            silverlight_xap_url: 'plupload/Moxie.xap',
            filters: {
                max_file_size: '2mb',
            },
            multipart_params: params,
            multi_selection: selection,
            init: {
                FilesAdded: function (up, files) {
                    var item = '';
                    plupload.each(files, function (file) { //遍历文件
                        item += "<span class='item' id='" + file['id'] + "'><span class='progress_bar'><span class='bar'></span><span class='percent'>0%</span></span></span>";
                    });
                    $("#photos_area").prepend(item);
                    uploader.start();
                },
                UploadProgress: function (up, file) { //上传中，显示进度条
                    var percent = file.percent;
                    $("#" + file.id).find('.bar').css({"width": percent + "%"});
                    $("#" + file.id).find(".percent").text(percent + "%");
                },
                FileUploaded: function (up, file, info) {
                    var data = eval("(" + info.response + ")");
                    $("#" + file.id).html("<a class='picture_delete'>×</a><input type=hidden name='pics[]' value='" + data.name + "'><img src='" + data.src + "' alt='" + data.name + "'>")

                    if (data.error != 0) {
                        alert(data.error);
                    }
                },
                Error: function (up, err) {
                    if (err.code == -600) {
                        alert("上传文件太大！");
                    }
                    if (err.code == -601) {
                        alert("请上传jpg,png,gif,jpeg,zip或rar！");
                    }
                }
            }
        });
        uploader.init();
    },
    removePluploadPic: function (re_that) {
        re_that.parent(".item").remove();
    },
};
$(document).ready(function () {
    common_ops.init();
});
