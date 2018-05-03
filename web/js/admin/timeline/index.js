;
var admin_timeline_index_ops = {
    init:function () {
        this.event();
    },
    event:function () {
        var that = this;
        common_ops.index_search_sub();
    },

};
$(document).ready(function () {
    admin_timeline_index_ops.init();
});

