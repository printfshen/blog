<?php

use app\common\services\StaticService;
use app\assets\AdminAsset;


StaticService::includeAppJsStatic("/js/admin/tag/edit.js", AdminAsset::className());
?>
<div id="content-container" class="admin_tag_edit_ops">

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
                                <input type="text" id="name" name="name" class="form-control"
                                       value="<?= $info ? $info['name'] : "" ?>" placeholder="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 control-label">status：</div>
                            <div class="col-md-9 control-label text-left">
                                <input id="demo-online-status-checkbox" class="toggle-switch" name="status"
                                       type="checkbox"
                                    <?= $info ? ($info['status'] == 1 ? "checked" : "") : "checked"; ?>>
                                <label for="demo-online-status-checkbox"></label>
                            </div>
                        </div>

                    </div>

                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <input type="hidden" name="id" value="<?= $info ? $info['id'] : 0; ?>">
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
