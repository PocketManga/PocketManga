<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Manager */

$this->title = $model->user->Username;
\yii\web\YiiAsset::register($this);
?>
<div class="manager-view row p-4">

    <div class="col-8">
        <h1 class="text-color2"><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-2">
        <a href="" data-toggle="modal" data-target="#updateRole" class="btn btn-primary w-100"><span class="text">Update</span></a>
    </div>
    <div class="col-2">
        <?= Html::a('Delete', Yii::$app->request->baseUrl.'/'.'manager/'.$model->IdManager.'/'.'delete', [
            'class' => 'btn btn-danger w-100 background-color6',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="col-12 ts-25 mt-4 pt-4 border-t-2px-solid-color3">
        <div class="row">
            <div class="col-9 mb-4">
                <div class="row bold">
                    <div class="col-6 mb-4">
                        <p class="text-color1">Username: <span class="text-color2 no-bold"><?=$model->user->Username?></span></p>
                    </div>
                    <div class="col-6 mb-4">
                        <p class="text-color1">Email: <span class="text-color2 no-bold"><?=$model->user->Email?></span></p>
                    </div>
                    <div class="col-6 mb-4">
                        <p class="text-color1">Genre: <span class="text-color2 no-bold"><?php if($model->user->Genre == 'M'){ echo 'Man';}else{if($model->user->Genre == 'F'){echo 'Woman';}else{echo 'Unknow';}}?></span></p>
                    </div>
                    <div class="col-6 mb-4">
                        <p class="text-color1">Birth Date: <span class="text-color2 no-bold"><?=(new DateTime($model->user->BirthDate))->format('d/m/Y')?></span></p>
                    </div>
                    <div class="col-6 mb-4">
                        <p class="text-color1">Status: <span class="text-color2 no-bold"><?=($model->Status)?'Active':'Inactive'?></span></p>
                    </div>
                    <div class="col-6 mb-4">
                        <p class="text-color1">Theme: <span class="text-color2 no-bold"><?=($model->Theme)?'Dark':'Light'?></span></p>
                    </div>
                    <div class="col-12 mb-4" id="role-div">
                        <p class="text-color1">Manager Type: <span class="text-color2 no-bold" id="role-span"><?=ucwords(str_replace('_', ' ', $Role->name))?></span></p>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-4 align-center">
                <?php if($model->user->SrcPhoto){ if (file_exists(Yii::getAlias('@webroot').'/img'.$model->user->SrcPhoto)){ ?>
                <img class="radi-all-50p" src="<?=Yii::$app->request->baseUrl.'/img'.$model->user->SrcPhoto?>" height="300" width="300">
                <?php }else{ ?>
                <img class="radi-all-50p" src="<?=Yii::$app->request->baseUrl.'/img/default/'.(($model->user->Genre == "F")?'F':'M').'.jpg'?>" height="300" width="300">
                <?php }}else{ ?>
                <img class="radi-all-50p" src="<?=Yii::$app->request->baseUrl.'/img/default/'.(($model->user->Genre == "F")?'F':'M').'.jpg'?>" height="300" width="300">
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Modal for change of role -->
<div class="modal fade" id="updateRole" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header pl-4 pb-1 pt-4">
                <h5 class="modal-title text-gray-800 font-weight-bold">Want to change manager type?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close-button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-group needs-validation mb-0" id="form-manager-change" action="<?=Yii::$app->request->baseUrl.'/'.'manager/'.$model->IdManager.'/update'?>" method="post">
                <input type="hidden" name="_csrf-backend">
                <div class="modal-body text-gray-800 pl-4 pr-5">
                    <div class="form-row mt-2 mb-3">
                        <div class="col-12">
                            <label for="role" class="text-gray-900">Manager Type <sup class="text-danger small">&#10033;</sup></label>
                            <select class="custom-select" name="Role" id="role">
                                <?php foreach($Roles as $role) { ?>
                                <option value="<?=$role->name?>" <?=($role->name == $Role->name)?'selected':''?>><?=ucwords(str_replace('_', ' ', $role->name))?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Oops, something's wrong...
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-3">
                    <a data-dismiss="modal" class="mr-4 font-weight-bold" id="close-option">Cancel</a>
                    <button type="submit" class="btn btn-primary font-weight-bold mr-2">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal for add new document -->