;
var admin_account_index_ops = {
    init: function () {
        this.eventBind();
    },
    eventBind: function () {
        $('#index_search_form .search').click(function () {
            $("#index_search_form").submit();
        })
    }
};
$(document).ready(function () {
    admin_account_index_ops.init();
});