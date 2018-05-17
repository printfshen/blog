<?php

?>
<div id="content-container" class="admin_access_set_ops">

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
                    <form action="" class="form-horizontal">

                        <div class="panel-body">

                            <div class="form-group">
                                <div class="col-md-3 control-label">文章分类：</div>
                                <div class="col-md-9">
                                    <select name="status" class="form-control inline">
                                        <option value="-1">请选择状态</option>
                                        <?php if ($category_list): ?>
                                            <?php foreach ($category_list as $c_item): ?>
                                                <option value="<?= $c_item['id'] ?>"><?= $c_item['_name'] ?></option>
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
                                                <input id="demo-form-inline-checkbox" class="magic-checkbox"
                                                       type="checkbox" name="keywords"
                                                       checked="">
                                                <label for="demo-form-inline-checkbox"><?= $t_item['name'] ?></label>
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
                                        <input type="hidden" name="bucket" value="timeline"/>
                                        <a class="cover_btn" id="cover_btn_big"><span>+</span></a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">title：</label>
                                <div class="col-md-9">
                                    <input type="text" id="title" name="title" class="form-control" placeholder="title">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-3 control-label">description：</div>
                                <div class="col-md-9">
                                    <textarea placeholder="description" name="description" rows="2"
                                              class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-3 control-label">内容：</div>
                                <div class="col-md-9">
                                    <textarea placeholder="Message" rows="13" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-3 control-label">is_top：</div>
                                <div class="col-md-9 control-label text-left">
                                    <input id="demo-online-status-checkbox" name="is_top" class="toggle-switch"
                                           type="checkbox"
                                           checked="">
                                    <label for="demo-online-status-checkbox"></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-3 control-label">is_original：</div>
                                <div class="col-md-9 control-label text-left">
                                    <input id="demo-online-status-checkbox" name="is_original" class="toggle-switch"
                                           type="checkbox"
                                           checked="">
                                    <label for="demo-online-status-checkbox"></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-3 control-label">status：</div>
                                <div class="col-md-9 control-label text-left">
                                    <input id="demo-online-status-checkbox" name="status" class="toggle-switch"
                                           type="checkbox"
                                           checked="">
                                    <label for="demo-online-status-checkbox"></label>
                                </div>
                            </div>

                        </div>

                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <button class="btn btn-mint" type="submit">save</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <!--===================================================-->
    <!--End page content-->


</div>
