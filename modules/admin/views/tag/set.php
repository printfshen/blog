<?php

use app\common\services\StaticService;
use app\assets\AdminAsset;

StaticService::includeAppCssStatic("/plugins/tagsinput/jquery.tagsinput.min.css", AdminAsset::className());
StaticService::includeAppJsStatic("/plugins/tagsinput/jquery.tagsinput.min.js", AdminAsset::className());

StaticService::includeAppJsStatic("/js/admin/tag/set.js", AdminAsset::className());

?>
<div id="content-container" class="admin_tag_set_ops">

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
                        <h3 class="panel-title">添加</h3>
                    </div>
                    <div class="panel-body form-horizontal">
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name">name：</label>
                            <div class="col-md-9">
                                <input type="text" id="name" name="tags" class="form-control" placeholder="name">
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <button class="btn btn-mint save" type="submit">save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--===================================================-->
    <!--End page content-->


</div>
