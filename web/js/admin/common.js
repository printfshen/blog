;
var common_ops = {
    init: function () {
        this.eventBind();
        this.ue = null;
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
    ops: function (act, id, url) {
        var callback = {
            "ok": function () {
                $.ajax({
                    url: url,
                    type: "post",
                    data: {
                        act: act,
                        id: id
                    },
                    dataType: "json",
                    success: function (res) {
                        var callback = null;
                        if (res.code == 200) {
                            callback = function () {
                                location.reload();
                            }
                        }
                        common_ops.alert(res.msg, callback);
                    }
                })
            },
            "cancel": null
        }
        common_ops.confirm((act == "remove") ? "确定删除？" : "确定恢复？", callback);
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
    datepicker: function (obj) {
        $.fn.datepicker.dates['cn'] = {   //切换为中文显示
            days: ["周日", "周一", "周二", "周三", "周四", "周五", "周六", "周日"],
            daysShort: ["日", "一", "二", "三", "四", "五", "六", "七"],
            daysMin: ["日", "一", "二", "三", "四", "五", "六", "七"],
            months: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
            monthsShort: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
            today: "今天",
            clear: "清除"
        };
        obj.datepicker({
            autoclose: true,          //自动关闭
            beforeShowDay: $.noop,    //在显示日期之前调用的函数
            calendarWeeks: false,     //是否显示今年是第几周
            clearBtn: false,          //显示清除按钮
            daysOfWeekDisabled: [],   //星期几不可选
            endDate: Infinity,        //日历结束日期
            forceParse: true,         //是否强制转换不符合格式的字符串
            format: 'yyyy-mm-dd',     //日期格式
            keyboardNavigation: true, //是否显示箭头导航
            language: 'cn',           //语言
            minViewMode: 0,
            orientation: "auto",      //方向
            rtl: false,
            startDate: -Infinity,     //日历开始日期
            startView: 0,             //开始显示
            todayBtn: true,          //今天按钮
            todayHighlight: true,     //今天高亮
            weekStart: 0              //星期几是开始
        });
    },
    select2Input: function (obj) {
        obj.select2({
            language: "zh-CN",
            width: '100%'
        })
    },
    tagsInput: function (obj) {
        obj.tagsInput({
            width: 'auto',
            height: 34,
            onAddTag: function (tag) {
            },
            onRemoveTag: function (tag) {
            }
        });
    },
};
$(document).ready(function () {
    common_ops.init();
});
