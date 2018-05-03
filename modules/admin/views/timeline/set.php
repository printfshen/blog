<?php
use app\common\services\UrlService;
use app\common\services\StaticService;
use app\assets\AdminAsset;

//时间控件
StaticService::includeAppJsStatic("/plugins/nifty-v2.5/demo/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js", AdminAsset::className());
StaticService::includeAppCssStatic("/plugins/nifty-v2.5/demo/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css", AdminAsset::className());

StaticService::includeAppJsStatic("/js/admin/timeline/set.js", AdminAsset::className());

?>
<div id="content-container" class="admin_timeline_set_ops">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

    <?php echo Yii::$app->view->renderFile("@app/modules/admin/views/common/tab_common.php") ?>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->

    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">

        <div class="row">
            <div class="col-xs-12">
                <div class="panel">

                    <div class="panel-heading">
                        <h3 class="panel-title">编辑</h3>
                    </div>
                    <form action="" class="form-horizontal">

                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">title：</label>
                                <div class="col-md-9">
                                    <input type="text" name="title" class="form-control" placeholder="name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="">content：</label>
                                <div class="col-md-9">
                                    <input type="text" name="content" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="">date：</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input id="admin_timeline_date" type="text" class="form-control" readonly >
                                        <span class="input-group-addon"><i class="demo-pli-clock"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">image：</label>
                                <div class="col-md-9">

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-3 control-label">content：</div>
                                <div class="col-md-9">
                                        <textarea placeholder="content" name="content" rows="13"
                                                  class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-3 control-label">status：</div>
                                <div class="col-md-9 control-label text-left">
                                    <input id="demo-online-status-checkbox" class="toggle-switch" type="checkbox"
                                           checked="">
                                    <label for="demo-online-status-checkbox"></label>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <button class="btn btn-mint" type="submit">save</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <!--===================================================-->
    <!--End page content-->
</div>
<iframe name="upload_file" class="hide"></iframe>
