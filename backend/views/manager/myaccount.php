<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Manager */

$this->title = 'My Account';
\yii\web\YiiAsset::register($this);
?>
<div class="manager-view row p-4">

    <div class="col-8">
        <h1 class="text-color2" id="title-myaccount"><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-2">
        <a href="" id="update-button" data-toggle="modal" data-target="#updateRole" class="btn btn-primary w-100"><span class="text">Update</span></a>
    </div>
    <div class="col-2">
        <?= Html::a('Logout', Yii::$app->request->baseUrl.'/logout', [
            'class' => 'btn btn-danger w-100 background-color4',
            'data' => [
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="col-12 ts-25 mt-4 pt-4 border-t-2px-solid-color3">
        <?php if (Yii::$app->session->hasFlash('Error')): ?>
        <div class="alert alert-warning alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?= Yii::$app->session->getFlash('Error') ?>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-9 mb-4">
                <div class="row bold">
                    <div class="col-6 mb-4">
                        <p class="text-color1">Username: <span class="text-color2 no-bold"><?=Yii::$app->user->identity->Username?></span></p>
                    </div>
                    <div class="col-6 mb-4">
                        <p class="text-color1">Email: <span class="text-color2 no-bold"><?=Yii::$app->user->identity->Email?></span></p>
                    </div>
                    <div class="col-6 mb-4">
                        <p class="text-color1">Gender: <span class="text-color2 no-bold"><?php if(Yii::$app->user->identity->Gender == 'M'){ echo 'Man';}else{if(Yii::$app->user->identity->Gender == 'F'){echo 'Woman';}else{echo 'Unknow';}}?></span></p>
                    </div>
                    <div class="col-6 mb-4">
                        <p class="text-color1">Birth Date: <span class="text-color2 no-bold"><?=(new DateTime(Yii::$app->user->identity->BirthDate))->format('d/m/Y')?></span></p>
                    </div>
                    <div class="col-6 mb-4">
                        <p class="text-color1">Status: <span class="text-color2 no-bold"><?=(Yii::$app->user->identity->manager->Status)?'Active':'Inactive'?></span></p>
                    </div>
                    <div class="col-6 mb-4">
                        <p class="text-color1">Theme: <span class="text-color2 no-bold"><?=(Yii::$app->user->identity->manager->Theme)?'Dark':'Light'?></span></p>
                    </div>
                    <div class="col-6 mb-4" id="role-div">
                        <p class="text-color1">Manager Type: <span class="text-color2 no-bold" id="role-span"><?=ucwords(str_replace('_', ' ', Yii::$app->user->identity->role->name))?></span></p>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-4 align-center">
                <?php if(Yii::$app->user->identity->SrcPhoto){ if (file_exists(Yii::getAlias('@webroot').'/img'.Yii::$app->user->identity->SrcPhoto)){ ?>
                <img class="radi-all-50p" src="<?=Yii::$app->request->baseUrl.'/img'.Yii::$app->user->identity->SrcPhoto?>" height="300" width="300">
                <?php }else{ ?>
                <img class="radi-all-50p" src="<?=Yii::$app->request->baseUrl.'/img/default/'.((Yii::$app->user->identity->Gender == "F")?'F':'M').'.jpg'?>" height="300" width="300">
                <?php }}else{ ?>
                <img class="radi-all-50p" src="<?=Yii::$app->request->baseUrl.'/img/default/'.((Yii::$app->user->identity->Gender == "F")?'F':'M').'.jpg'?>" height="300" width="300">
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Modal for change of role -->
<div class="modal fade" id="updateRole" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content background-color2">
            <div class="modal-header pl-4 pb-1 pt-4 border-b-2px-solid-color3">
                <h5 class="modal-title text-gray-800 bold">Want to update your info?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close-button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php $form = ActiveForm::begin(); ?>
                <input type="hidden" name="_csrf-backend">
                <div class="modal-body text-gray-800 pl-4 pr-5">
                    <div class="form-row mt-2 mb-3">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 align-center">
                                    <?php if(Yii::$app->user->identity->SrcPhoto){ if (file_exists(Yii::getAlias('@webroot').'/img'.Yii::$app->user->identity->SrcPhoto)){ ?>
                                        <a href="#" onclick="return ClickChange()">
                                            <img class="radi-all-50p" id="uploadPreview" width="250px" height="250px" src="<?=Yii::$app->request->baseUrl.'/img'.Yii::$app->user->identity->SrcPhoto?>"/>
                                        </a>
                                        <?= $form->field($model, 'Photo')->fileInput(['id' => 'uploadImage', 'onchange'=>'PreviewImage("'.Yii::$app->request->baseUrl.'/img'.Yii::$app->user->identity->SrcPhoto.'");', 'style'=>'display:none;'])->label(false);?>
                                    <?php }else{ ?>
                                        <a href="#" onclick="return ClickChange()">
                                            <img class="radi-all-50p" id="uploadPreview" width="250px" height="250px" src="<?=Yii::$app->request->baseUrl.'/img/default/addImg.png'?>"/>
                                        </a>
                                        <?= $form->field($model, 'Photo')->fileInput(['id' => 'uploadImage', 'onchange'=>'PreviewImage("'.Yii::$app->request->baseUrl.'/img/default/addImg.png'.'");', 'style'=>'display:none;'])->label(false);?>
                                    <?php }}else{ ?>
                                        <a href="#" onclick="return ClickChange()">
                                            <img class="radi-all-50p" id="uploadPreview" width="250px" height="250px" src="<?=Yii::$app->request->baseUrl.'/img/default/addImg2.png'?>"/>
                                        </a>
                                        <?= $form->field($model, 'Photo')->fileInput(['id' => 'uploadImage', 'onchange'=>'PreviewImage("'.Yii::$app->request->baseUrl.'/img/default/addImg2.png'.'");', 'style'=>'display:none;'])->label(false);?>
                                    <?php } ?>
                                </div>
                                <div class="col-12">
                                    <label class="text-gray-900">Username <sup class="text-danger small">&#10033;</sup></label>
                                    <div class="form-group field-myaccount-username required">
                                        <input type="text" value="<?=(Yii::$app->user->identity->Username)?Yii::$app->user->identity->Username:''?>" id="myaccount-username" class="p-1 w-100 radi-all-15 border-color1 background-color1 text-color2 bold text-center" name="MyAccountForm[Username]" maxlength="100" autocomplete="off" aria-required="true">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="text-gray-900">Gender <sup class="text-danger small">&#10033;</sup></label>
                                    <div class="form-group field-myaccount-gender">
                                        <select id="myaccount-gender" class="radi-all-15 p-1 background-color1 border-0 w-100 text-color2 align-center" name="MyAccountForm[Gender]">
                                            <option value="D" <?=(Yii::$app->user->identity->Gender == "D")?'selected':''?>>Unknow</option>
                                            <option value="M" <?=(Yii::$app->user->identity->Gender == "M")?'selected':''?>>Male</option>
                                            <option value="F" <?=(Yii::$app->user->identity->Gender == "F")?'selected':''?>>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="text-gray-900">BirthDate <sup class="text-danger small">&#10033;</sup></label>
                                    <div class="form-group required">
                                        <input type="date" id="myaccount-birthdate" class="radi-all-15 pb-1 background-color1 border-0 w-100 text-color2 align-center hasDatepicker" name="MyAccountForm[BirthDate]" max="2099-12-31" value="<?=Yii::$app->user->identity->BirthDate?>" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="text-gray-900">Theme <sup class="text-danger small">&#10033;</sup></label>
                                    <div class="form-group field-myaccount-theme">
                                        <select id="myaccount-theme" class="radi-all-15 p-1 background-color1 border-0 w-100 text-color2 align-center" name="MyAccountForm[Theme]">
                                            <option value="0" <?=(Yii::$app->user->identity->manager->Theme == 0)?'selected':''?>>Light</option>
                                            <option value="1" <?=(Yii::$app->user->identity->manager->Theme == 1)?'selected':''?>>Dark</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                Oops, something's wrong...
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-3 border-t-2px-solid-color3">
                    <a style="cursor: pointer;" data-dismiss="modal" class="mr-4 bold text-color1" id="close-option">Cancel</a>
                    <button type="submit" id="submit-update-button" class="btn btn-primary bold mr-2 background-color3 text-color2">Update</button>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<!-- End of Modal for add new document -->

<script>
    function ChangeFormAction(url){
        var select = $('#role');
        action = url+select.val();
        $('#form-manager-change').attr("action", action);
    }
    
    function ClickChange(){
        var inputUpload = document.getElementById("uploadImage");
        inputUpload.click();
    };
    function PreviewImage(SrcImage) {
        var oFReader = new FileReader();

        var Butt = document.getElementById("uploadImage");
        var Img = document.getElementById("uploadPreview");
        try{
            oFReader.readAsDataURL(Butt.files[0]);
            
            oFReader.onload = function (oFREvent) {
                Img.src = oFREvent.target.result;
            };
        }catch(NullPointerException){
            Img.src = SrcImage;
        }
    };
</script>