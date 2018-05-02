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
    }
};
$(document).ready(function () {
    common_ops.init();
});
