<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Managers';
?>
<div class="manager-index row p-4">

    <div class="col-10">
        <h1 class="text-color2"><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="col-2">
        <?= Html::a('Create Manager', Yii::$app->request->baseUrl.'/'.'manager/create', ['class' => 'btn btn-success w-100 background-color5']) ?>
    </div>
    <div class="col-12 mt-4 ts-25">
        <table class="table border-0 text-color2" id="table" width="100%">
            <thead>
                <tr>
                    <th class="border-b-2px-solid-color3 border-t-0">Username</th>
                    <th class="border-b-2px-solid-color3 border-t-0 text-center">Email</th>
                    <th class="border-b-2px-solid-color3 border-t-0 text-center">Role</th>
                    <th class="border-b-2px-solid-color3 border-t-0 text-center">Genre</th>
                    <th class="border-b-2px-solid-color3 border-t-0 text-center">Status</th>
                    <th class="border-b-2px-solid-color3 border-t-0 text-center" style="max-width:100px; min-width:100px;">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php if($Managers){ foreach($Managers as $Manager){ 
                    $roleModel = Yii::$app->db
                        ->createCommand("Select * from auth_assignment where user_id='".$Manager->IdManager."'")
                        ->queryOne();

                    $Role = null;
                    foreach ($Roles as $URole){
                        if($URole->name == $roleModel['item_name']){
                            $Role = $URole;
                        }
                    }
                ?>
                    <tr class="tr_list1">
                        <td class="border-b-2px-solid-color3 p-0"><a class="text-color2 w-100 h-100 no-hover" href="<?=Yii::$app->request->baseUrl.'/'.'manager/'.$Manager->IdManager?>"><div class="w-100 h-100 p-3"><?=$Manager->user->Username?></div></a></td>
                        <td class="border-b-2px-solid-color3 p-0 text-center"><a class="text-color2 no-hover" href="<?=Yii::$app->request->baseUrl.'/'.'manager/'.$Manager->IdManager?>"><div class="w-100 h-100 p-3"><?=$Manager->user->Email?></div></a></td>
                        <td class="border-b-2px-solid-color3 p-0 text-center"><a class="text-color2 no-hover" href="<?=Yii::$app->request->baseUrl.'/'.'manager/'.$Manager->IdManager?>"><div class="w-100 h-100 p-3"><?=ucwords(str_replace('_', ' ', $Role->name))?></div></a></td>
                        <td class="border-b-2px-solid-color3 p-0 text-center"><a class="text-color2 no-hover" href="<?=Yii::$app->request->baseUrl.'/'.'manager/'.$Manager->IdManager?>"><div class="w-100 h-100 p-3"><?php if($Manager->user->Genre == 'M'){ echo 'Man';}else{if($Manager->user->Genre == 'F'){echo 'Woman';}else{echo 'Unknow';}}?></div></a></td>
                        <td class="border-b-2px-solid-color3 p-0 text-center"><a class="text-color2 no-hover" href="<?=Yii::$app->request->baseUrl.'/'.'manager/'.$Manager->IdManager?>"><div class="w-100 h-100 p-3"><?=($Manager->user->status == 10)?'Active':'Inactive'?></div></a></td>
                        <td class="border-b-2px-solid-color3 p-0 text-center align-middle">
                            <a href="<?=Yii::$app->request->baseUrl.'/'.'manager/'.$Manager->IdManager?>" class="btn btn-sm btn-outline-primary"><i class="far fa-eye"></i></a>
                            <a href="<?=Yii::$app->request->baseUrl.'/'.'manager/'.$Manager->IdManager.'/delete'?>" class="btn btn-sm btn-outline-danger" data-confirm="Are you sure you want to delete this item?" data-method="post"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php }} ?>
            </tbody>
        </table>
    </div>
</div>
