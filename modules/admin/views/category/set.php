<?php
use app\common\services\StaticService;
use app\assets\AdminAsset;


StaticService::includeAppCssStatic("/plugins/tagsinput/jquery.tagsinput.min.css", AdminAsset::className());
StaticService::includeAppJsStatic("/plugins/tagsinput/jquery.tagsinput.min.js", AdminAsset::className());

StaticService::includeAppCssStatic("/plugins/select2/select2.min.css", AdminAsset::className());
StaticService::includeAppJsStatic("/plugins/select2/select2.pinyin.js", AdminAsset::className());
StaticService::includeAppJsStatic("/plugins/select2/zh-CN.js", AdminAsset::className());
StaticService::includeAppJsStatic("/plugins/select2/pinyin.core.js", AdminAsset::className());

StaticService::includeAppJsStatic("/js/admin/category/set.js", AdminAsset::className());


?>
<div id="content-container" class="admin_category_set_ops">

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
                            <div class="col-md-3 control-label">父级分类：</div>
                            <div class="col-md-9">
                                <select name="f_id" class="form-control inline">
                                    <option value="0">请选择状态</option>
                                    <?php if ($list): ?>
                                        <?php foreach ($list as $_item): ?>
                                            <option value="<?= $_item['id'] ?>"><?= $_item['_name'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name">name：</label>
                            <div class="col-md-9">
                                <input type="text" id="name" name="name" value="<?= $info ? $info['name'] : ""; ?>"
                                       class="form-control" placeholder="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 control-label">description：</div>
                            <div class="col-md-9">
                                <textarea placeholder="Message" id="description" name="description" rows="13"
                                          class="form-control"><?= $info ? $info['description'] : ""; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="">keyword：</label>
                            <div class="col-md-9">
                                <input type="text" id="" name="keyword" value="<?= $info ? $info['keyword'] : ""; ?>"
                                       class="form-control" placeholder="keyword">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="">sort：</label>
                            <div class="col-md-9">
                                <input type="text" id="" name="sort" class="form-control" placeholder=""
                                       value="<?= $info ? $info['sort'] : 255; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 control-label">status：</div>
                            <div class="col-md-9 control-label text-left">
                                <input id="demo-online-status-checkbox" name="status" class="toggle-switch"
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
