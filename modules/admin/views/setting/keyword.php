<?php

use app\common\services\StaticService;
use app\assets\AdminAsset;

StaticService::includeAppCssStatic("/plugins/tagsinput/jquery.tagsinput.min.css", AdminAsset::className());
StaticService::includeAppJsStatic("/plugins/tagsinput/jquery.tagsinput.min.js", AdminAsset::className());

StaticService::includeAppJsStatic("/js/admin/setting/keyword.js", AdminAsset::className());

?>
<div id="content-container" class="admin_setting_keyword">

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
                        <h3 class="panel-title">关键字</h3>
                    </div>
                    <div class="panel-body form-horizontal">
                        <div class="form-group">
                            <div class="col-md-1"></div>
                            <div class="col-md-9">
                                        <textarea placeholder="content" id="keyword" rows="13"
                                                  class="form-control"><?= $keyword ? $keyword->value : "" ?></textarea>
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
