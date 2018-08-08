<?php

use app\common\services\StaticService;
use app\assets\AdminAsset;

StaticService::includeAppJsStatic("/js/admin/setting/index.js", AdminAsset::className());
?>
<div id="content-container" class="admin_setting_index_ops">

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
                        <h3 class="panel-title">网站设置</h3>
                    </div>
                    <div class="panel-body form-horizontal">
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="WebName">网站名称：</label>
                            <div class="col-md-9">
                                <input type="text" placeholder="WebName" id="WebName" name="WebName"
                                       value="<?= $info ? $info['WebName'] : ""; ?>"
                                       class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="WebKeyWords">网站介绍：</label>
                            <div class="col-md-9">
                                <textarea placeholder="WebKeyWords" id="WebKeyWords" name="WebKeyWords" rows="3"
                                          class="form-control"><?= $info ? $info['WebKeyWords'] : ""; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="WebDescription">网站描述：</label>
                            <div class="col-md-9">
                                <textarea placeholder="WebDescription" id="WebDescription" name="WebDescription" rows="3"
                                          class="form-control"><?= $info ? $info['WebDescription'] : ""; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="WebICP">备案号：</label>
                            <div class="col-md-9">
                                <input type="text" id="WebICP" name="WebICP" value="<?= $info ? $info['WebICP'] : ""; ?>"
                                       class="form-control" placeholder="WebICP">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="WebEmail">站长邮箱：</label>
                            <div class="col-md-9">
                                <input type="text" id="WebEmail" name="WebEmail" value="<?= $info ? $info['WebEmail'] : ""; ?>"
                                       class="form-control" placeholder="WebEmail">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="WebCopyright">保留版权提示：</label>
                            <div class="col-md-9">
                                <input type="text" id="" name="WebCopyright"
                                       value="<?= $info ? $info['WebCopyright'] : ""; ?>"
                                       class="form-control" placeholder="WebCopyright">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 control-label">网站状态：</div>
                            <div class="col-md-9 control-label text-left">
                                <input id="demo-online-status-checkbox" name="status" class="status"
                                       type="checkbox"
                                    <?= $info ? ($info['WebStatus'] == 1 ? "checked" : "") : "checked"; ?>>
                                <label for="demo-online-status-checkbox"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 control-label">提示文字：</div>
                            <div class="col-md-9">
                                <textarea placeholder="WebMessage" id="WebMessage" name="WebMessage" rows="3"
                                          class="form-control"><?= $info ? $info['WebMessage'] : ""; ?></textarea>
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
