<?php
use app\common\services\UrlService;
use app\common\services\StaticService;
use app\assets\AdminAsset;

//上传控件
StaticService::includeAppJsStatic("/plugins/plupload/plupload.full.min.js", AdminAsset::className());

StaticService::includeAppJsStatic("/js/admin/link/set.js", AdminAsset::className());

?>
<div id="content-container" class="admin_link_set_ops" xmlns="http://www.w3.org/1999/html">

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
                            <label class="col-md-3 control-label" for="title">title：</label>
                            <div class="col-md-9">
                                <input type="text" id="title" name="title" class="form-control" placeholder="title"
                                       value="<?= $info ? $info['title'] : "" ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="url">url：</label>
                            <div class="col-md-9">
                                <input type="text" id="url" name="url" class="form-control" placeholder="url"
                                       value="<?= $info ? $info['url'] : "" ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">image：</label>
                            <div class="col-md-9">
                                <div id="photos_area" class="photos_area">
                                    <?php
                                    if ($info): ?>
                                        <?php if ($info['pic']): ?>
                                            <span class='item' id=''>
                                        <a class='picture_delete'>×</a>
                                        <input type=hidden name='pics[]' value='<?= $info['pic'] ?>'>
                                                <img src='<?= UrlService::buildPicUrl("link", $info['pic']); ?>'
                                                     alt=''/>
                                    </span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <input type="hidden" name="bucket" value="link"/>
                                    <a class="cover_btn" id="cover_btn_big"><span>+</span></a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 control-label">remark：</div>
                            <div class="col-md-9">
                                        <textarea placeholder="remark" id="remark" rows="3"
                                                  class="form-control"><?= $info ? $info['remark'] : "" ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 control-label">status：</div>
                            <div class="col-md-9 control-label text-left">
                                <input id="demo-online-status-checkbox" class="status" type="checkbox"
                                    <?= $info ? ($info['status'] == 1 ? "checked" : "") : "checked"; ?>>
                                <label for="demo-online-status-checkbox"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="sort">sort：</label>
                            <div class="col-md-9">
                                <input type="text" id="url" name="sort" class="form-control" placeholder="sort"
                                       value="<?= $info ? $info['sort'] : 255 ?>">
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
<iframe name="upload_file" class="hide"></iframe>
