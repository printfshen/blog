;
var common_ops = {
    init:function () {
        this.eventBind();
    },
    eventBind:function () {
        var that = this;


    },
    tip:function (msg, target) {
        layer.tips(msg, target, {
            tips: [3, "#75717a"]
        });
        $("html, body").animate({
            scrollTop:target.offset().top - 10
        }, 100);
    }
};
$(document).ready(function () {
    common_ops.init();
});
