;
var admin_tag_index_ops = {
    init: function () {
        this.eventBind();
        common_ops.index_search_sub();
    },
    eventBind: function () {

        $(".remove").click(function () {
            common_ops.ops("remove", $(this).attr("data"), common_ops.buildAdmin("/tag/ops"));
        });

        $(".recover").click(function () {
            common_ops.ops("recover", $(this).attr("data"), common_ops.buildAdmin("/tag/ops"));
        });

    }
};
$(document).ready(function () {
    admin_tag_index_ops.init();
});