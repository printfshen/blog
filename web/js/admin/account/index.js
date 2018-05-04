;
var admin_account_index_ops = {
    init: function () {
        this.eventBind();
    },
    eventBind: function () {
        var that = this;

        common_ops.index_search_sub();
        $(".remove").click(function () {
            that.ops("remove", $(this).attr("data"));
        });

        $(".recover").click(function () {
            that.ops("recover", $(this).attr("data"));
        })

    },
    ops: function (act, id) {
        var callback = {
            "ok": function () {
                $.ajax({
                    url: common_ops.buildAdmin("/account/ops"),
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
                                window.location.href = window.location.href;
                            }
                        }
                        common_ops.alert(res.msg, callback);
                    }
                })
            },
            "cancel": null
        }
        common_ops.confirm((act == "remove") ? "确定删除？" : "确定恢复？", callback);
    }
};
$(document).ready(function () {
    admin_account_index_ops.init();
});