;
var admin_timeline_index_ops = {
    init:function () {
        this.event();
        common_ops.index_search_sub();
    },
    event:function () {
        var that = this;

        $(".remove").click(function () {
            common_ops.ops("remove", $(this).attr("data"), common_ops.buildAdmin("/timeline/ops"));
        });

        $(".recover").click(function () {
            common_ops.ops("recover", $(this).attr("data"), common_ops.buildAdmin("/timeline/ops"));
        })
    }

};
$(document).ready(function () {
    admin_timeline_index_ops.init();
});

