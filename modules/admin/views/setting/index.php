<?php

use app\common\services\StaticService;
use app\assets\AdminAsset;
use app\common\services\UrlService;

StaticService::includeAppJsStatic("/js/admin/setting/index.js", AdminAsset::className());
//上传控件
StaticService::includeAppJsStatic("/plugins/plupload/plupload.full.min.js", AdminAsset::className());
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
                                <textarea placeholder="WebDescription" id="WebDescription" name="WebDescription"
                                          rows="3"
                                          class="form-control"><?= $info ? $info['WebDescription'] : ""; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="WebICP">备案号：</label>
                            <div class="col-md-9">
                                <input type="text" id="WebICP" name="WebICP"
                                       value="<?= $info ? $info['WebICP'] : ""; ?>"
                                       class="form-control" placeholder="WebICP">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="WebMasterName">站长姓名：</label>
                            <div class="col-md-9">
                                <input type="text" id="WebMasterName" name="WebMasterName"
                                       value="<?= $info ? $info['WebMasterName'] : ""; ?>"
                                       class="form-control" placeholder="WebMasterName">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">站长头像：</label>
                            <div class="col-md-9">
                                <div id="photos_area" class="photos_area">
                                    <?php
                                    if ($info): ?>
                                        <?php if ($info['WebMasterAvatar']): ?>
                                            <span class='item' id=''>
                                        <a class='picture_delete'>×</a>
                                        <input type=hidden name='pics[]' value='<?= $info['WebMasterAvatar'] ?>'>
                                                <img src='<?= UrlService::buildPicUrl("config", $info['WebMasterAvatar']); ?>'
                                                     alt=''/>
                                    </span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <input type="hidden" name="bucket" value="config"/>
                                    <a class="cover_btn" id="cover_btn_big"><span>+</span></a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="WebMasterSkill">技能点：</label>
                            <div class="col-md-9">
                                <input type="text" id="WebMasterSkill" name="WebMasterSkill"
                                       value="<?= $info ? $info['WebMasterSkill'] : ""; ?>"
                                       class="form-control" placeholder="WebMasterSkill">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="WebEmail">站长邮箱：</label>
                            <div class="col-md-9">
                                <input type="text" id="WebEmail" name="WebEmail"
                                       value="<?= $info ? $info['WebEmail'] : ""; ?>"
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
