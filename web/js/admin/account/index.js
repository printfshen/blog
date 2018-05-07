;
var admin_account_index_ops = {
    init: function () {
        this.eventBind();
    },
    eventBind: function () {
        var that = this;

        common_ops.index_search_sub();

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