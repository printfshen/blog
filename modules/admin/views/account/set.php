<?php

use app\common\services\StaticService;
use app\assets\AdminAsset;

StaticService::includeAppJsStatic("/js/admin/account/set.js", AdminAsset::className());
?>
<div id="content-container" class="admin_account_set_ops">

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
                    <div class="panel-body form-horizontal">

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name">nickname：</label>
                            <div class="col-md-9">
                                <input type="text" name="nickname" class="form-control" placeholder="nickname">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="">mobile：</label>
                            <div class="col-md-9">
                                <input type="text" name="mobile" class="form-control" placeholder="mobile">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="">email：</label>
                            <div class="col-md-9">
                                <input type="text" name="email" class="form-control" placeholder="email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="">login_name：</label>
                            <div class="col-md-9">
                                <input type="text" name="login_name" class="form-control" placeholder="login_name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="">login_pwd：</label>
                            <div class="col-md-9">
                                <input type="password" name="login_pwd" class="form-control" placeholder="login_pwd">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 control-label">status：</div>
                            <div class="col-md-9 control-label text-left">
                                <input id="demo-online-status-checkbox" class="toggle-switch" name="status"
                                       type="checkbox" checked="">
                                <label for="demo-online-status-checkbox"></label>
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <button class="btn btn-mint save">save</button>
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
