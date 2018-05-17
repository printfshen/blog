;
var admin_article_index_ops = {
    init: function () {
        this.eventBind();
        common_ops.index_search_sub();
    },
    eventBind: function () {
        var that = this;

    }
};
$(document).ready(function () {
    admin_article_index_ops.init();
});