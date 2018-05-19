<?php
/**
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/18
 * Time: 18:19
 */
?>

<form action="<?= $form_action ?>" method="get" id="index_search_form">
    <div class="col-sm-8 table-toolbar-left">
        <div class="form-group">
            <div class="form-group">
                <select name="status" class="form-control inline">
                    <?php foreach ($status_mapping as $_status => $_title): ?>
                        <option <?= $_status == $search_conditions['status'] ? 'selected' : ''; ?>
                                value="<?= $_status ?>"><?= $_title ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="mix_kw" placeholder="请输入内容"
                           class="form-control"
                           value="<?= $search_conditions['mix_ky'] ?>">
                    <input type="hidden" name="p"
                           value="<?= $search_conditions['p'] ?>">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-primary search">
                            <i class="fa fa-search"></i>Search
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</form>