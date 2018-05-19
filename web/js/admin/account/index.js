;
var admin_account_index_ops = {
    init: function () {
        this.eventBind();
        common_ops.index_search_sub();
    },
    eventBind: function () {
        var that = this;

        $(".remove").click(function () {
            common_ops.ops("remove", $(this).attr("data"), common_ops.buildAdmin("/account/ops"));
        });

        $(".recover").click(function () {
            common_ops.ops("recover", $(this).attr("data"), common_ops.buildAdmin("/account/ops"));
        })

    }
};
$(document).ready(function () {
    admin_account_index_ops.init();
});