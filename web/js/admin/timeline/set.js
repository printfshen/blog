;
var admin_timeline_set_ops = {
    init: function () {
        this.eventBind();
        common_ops.initpPluploadUploader(
            'cover_btn_big',
            common_ops.buildWww('/upload/plupload'),
            {bucket: $('input[name=bucket]').val()},
            false
        );
    },
    eventBind: function () {
        var that = this;
        that.datepicker($("#admin_timeline_date"));

        $("body").on("click", ".picture_delete", function () {
            common_ops.removePluploadPic($(this));
        });

        that.admin_timeline_set_sub();


    },
    datepicker: function (obj) {
        $.fn.datepicker.dates['cn'] = {   //切换为中文显示
            days: ["周日", "周一", "周二", "周三", "周四", "周五", "周六", "周日"],
            daysShort: ["日", "一", "二", "三", "四", "五", "六", "七"],
            daysMin: ["日", "一", "二", "三", "四", "五", "六", "七"],
            months: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
            monthsShort: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
            today: "今天",
            clear: "清除"
        };
        obj.datepicker({
            autoclose: true,          //自动关闭
            beforeShowDay: $.noop,    //在显示日期之前调用的函数
            calendarWeeks: false,     //是否显示今年是第几周
            clearBtn: false,          //显示清除按钮
            daysOfWeekDisabled: [],   //星期几不可选
            endDate: Infinity,        //日历结束日期
            forceParse: true,         //是否强制转换不符合格式的字符串
            format: 'yyyy-mm-dd',     //日期格式
            keyboardNavigation: true, //是否显示箭头导航
            language: 'cn',           //语言
            minViewMode: 0,
            orientation: "auto",      //方向
            rtl: false,
            startDate: -Infinity,     //日历开始日期
            startView: 0,             //开始显示
            todayBtn: false,          //今天按钮
            todayHighlight: true,     //今天高亮
            weekStart: 0              //星期几是开始
        });
    },
    admin_timeline_set_sub: function () {
        var clickCheckbox = document.querySelector(".toggle-switch"),
            clickButton = document.querySelector(".save");
        clickButton.addEventListener("click", function () {
            var btn_target = $(this);
            if (btn_target.hasClass("disabled")) {
                common_ops.alert("正在处理!!请不要重复提交");
                return
            }
            var id = $(".admin_timeline_set_ops input[name=id]").val();

            var status = clickCheckbox.checked ? 1 : 0;

            var title_target = $(".admin_timeline_set_ops input[name=title]");
            var title = title_target.val();

            var date_target = $(".admin_timeline_set_ops input[name=date]");
            var date = date_target.val();

            if ($(".photos_area .item input").length > 1) {
                common_ops.alert("图片最多上传一张图片，请删除多余的图片提交!");
                return;
            }
            var pics = [];
            $(".photos_area .item input").each(function (index, value) {
                pics.push($(value).val());
            });

            var content_target = $("#content");
            var content = content_target.val();
            if (content.length < 1) {
                common_ops.tip("请输入内容", content_target);
                return;
            }
            btn_target.addClass("disabled");
            $.ajax({
                url: common_ops.buildAdmin("/timeline/set"),
                data: {
                    id: id,
                    title: title,
                    date: date,
                    content: content,
                    pics: pics,
                    status: status
                },
                type: "post",
                dataType: "json",
                success: function (res) {
                    btn_target.removeClass("disabled");
                    var callback = null;
                    if (res.code == 200) {
                        callback = function () {
                            window.location.href = common_ops.buildAdmin("/timeline/index");
                        }
                    }
                    common_ops.alert(res.msg, callback);
                }
            })
        });
    }
};
$(document).ready(function () {
    admin_timeline_set_ops.init();
});