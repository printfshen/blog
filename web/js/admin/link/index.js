;
var admin_link_index_ops = {
    init:function () {
        this.eventBind();
    },
    eventBind:function () {
        $(".remove").click(function () {
            common_ops.ops("remove", $(this).attr("data"), common_ops.buildAdmin("/link/ops"));
        });

        $(".recover").click(function () {
            common_ops.ops("recover", $(this).attr("data"), common_ops.buildAdmin("/link/ops"));
        })
    }
};
$(document).ready(function () {
    admin_link_index_ops.init()
});