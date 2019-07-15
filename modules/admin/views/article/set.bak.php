<?php

use app\common\services\StaticService;
use app\assets\AdminAsset;
use app\common\services\UrlService;

StaticService::includeAppJsStatic("/plugins/ueditor/ueditor.config.js", \app\assets\WebAsset::className());
StaticService::includeAppJsStatic("/plugins/ueditor/ueditor.all.min.js", \app\assets\WebAsset::className());
StaticService::includeAppJsStatic("/plugins/ueditor/lang/zh-cn/zh-cn.js", \app\assets\WebAsset::className());
//上传控件
StaticService::includeAppJsStatic("/plugins/plupload/plupload.full.min.js", AdminAsset::className());

StaticService::includeAppJsStatic("/js/admin/article/set.js", AdminAsset::className());

?>
<div id="content-container" class="admin_article_set_ops">

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
                            <div class="col-md-3 control-label">文章分类：</div>
                            <div class="col-md-9">
                                <select name="c_id" class="form-control inline c_id_select">
                                    <option value="-1">请选择状态</option>
                                    <?php if ($category_list): ?>
                                        <?php foreach ($category_list as $c_item): ?>
                                            <option <?php if ($info) {
                                                if ($info['c_id'] == $c_item['id']) {
                                                    echo "selected";
                                                }
                                            } ?> value="<?= $c_item['id'] ?>"><?= $c_item['_name'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name">keywords：</label>
                            <div class="col-md-9">
                                <div class="checkbox">

                                    <!-- Inline Checkboxes -->
                                    <?php if ($tag_list): ?>
                                        <?php foreach ($tag_list as $t_item): ?>
                                            <label class="form-checkbox form-icon">
                                                <input type="checkbox" name="keywords"
                                                    <?php if (in_array($t_item['id'], $info_tag)) {
                                                        echo "checked";
                                                    } ?>
                                                       value="<?= $t_item['id']; ?>"><?= $t_item['name']; ?>
                                            </label>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
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
                                                <img src='<?= UrlService::buildPicUrl("article", $info['pic']); ?>'
                                                     alt=''/>
                                    </span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <input type="hidden" name="bucket" value="article"/>
                                    <a class="cover_btn" id="cover_btn_big"><span>+</span></a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name">title：</label>
                            <div class="col-md-9">
                                <input type="text" id="title" name="title" class="form-control"
                                       value="<?= $info ? $info['title'] : ""; ?>" placeholder="title">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 control-label">description：</div>
                            <div class="col-md-9">
                                    <textarea placeholder="description" name="description" rows="2"
                                              class="form-control"><?= $info ? $info['description'] : ""; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 control-label">内容：</div>
                            <div class="col-md-9">
                                <textarea placeholder="content" id="editor" style="height: 400px"><?= $info ? $info['content'] : ""; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 control-label">is_top：</div>
                            <div class="col-md-9 control-label text-left">
                                <input id="demo-online-status-checkbox" name="is_top" class="is_top"
                                       type="checkbox"
                                    <?= $info ? ($info['is_top'] == 1 ? "checked" : "") : "checked"; ?>>
                                <label for="demo-online-status-checkbox"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 control-label">is_original：</div>

                            <div class="col-md-9 control-label text-left">
                                <input id="demo-online-status-checkbox" name="is_original" class="is_original"
                                       type="checkbox"
                                    <?= $info ? ($info['is_original'] == 1 ? "checked" : "") : "checked"; ?>>
                                <label for="demo-online-status-checkbox"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 control-label">status：</div>
                            <div class="col-md-9 control-label text-left">
                                <input id="demo-online-status-checkbox" name="status" class="status"
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
