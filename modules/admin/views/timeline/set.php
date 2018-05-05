<?php
use app\common\services\UrlService;
use app\common\services\StaticService;
use app\assets\AdminAsset;

//时间控件
StaticService::includeAppJsStatic("/plugins/nifty-v2.5/demo/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js", AdminAsset::className());
StaticService::includeAppCssStatic("/plugins/nifty-v2.5/demo/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css", AdminAsset::className());
//上传控件
StaticService::includeAppJsStatic("/plugins/plupload/plupload.full.min.js", AdminAsset::className());

StaticService::includeAppJsStatic("/js/admin/timeline/set.js", AdminAsset::className());

?>
<div id="content-container" class="admin_timeline_set_ops" xmlns="http://www.w3.org/1999/html">

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
                                <input type="text" id="title" name="title" class="form-control" placeholder="title">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="">date：</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input id="admin_timeline_date" name="date" type="text" class="form-control"
                                           readonly
                                           value="<?= date("Y-m-d") ?>">
                                    <span class="input-group-addon"><i class="demo-pli-clock"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">image：</label>
                            <div class="col-md-9">
                                <div id="photos_area" class="photos_area">
                                    <?php $info = [];
                                    if ($info): ?>
                                        <?php if ($info['book_pic']): ?>
                                            <?php foreach ($info['book_pic'] as $_item_pic): ?>
                                                <span class='item' id=''>
                                        <a class='picture_delete'>×</a>
                                        <input type=hidden name='pics[]' value='<?= $_item_pic ?>'><img src='' alt=''/>
                                    </span>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <input type="hidden" name="bucket" value="timeline"/>
                                    <a class="cover_btn" id="cover_btn_big"><span>+</span></a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 control-label">content：</div>
                            <div class="col-md-9">
                                        <textarea placeholder="content" id="content" rows="13"
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
