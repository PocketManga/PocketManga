<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'PocketManga';
?>
<ul class="nav nav-pills nav-justified">
    <li class="nav-item">
        <a class="nav-link <?php echo (Yii::$app->controller->route == 'site/index') ? 'active background-color2 text-color3' : 'text-color2'?>" href="<?=Url::to('home')?>" href="<?=Url::to('home')?>"><?=Yii::$app->params['Dictionary']['home']?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo (Yii::$app->controller->route == 'site/about') ? 'active background-color2 text-color3' : 'text-color2'?>" href="<?=Url::to('about')?>"><?=Yii::$app->params['Dictionary']['all_manga']?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo (Yii::$app->controller->route == 'site/contact') ? 'active background-color2 text-color3' : 'text-color2'?>" href="<?=Url::to('contact')?>"><?=Yii::$app->params['Dictionary']['ongoing']?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo (Yii::$app->controller->route == 'site/contact') ? 'active background-color2 text-color3' : 'text-color2'?>" href="<?=Url::to('contact')?>"><?=Yii::$app->params['Dictionary']['completed']?></a>
    </li>
    <?php if (Yii::$app->user->isGuest) { ?>
    <li class="nav-item">
        <a class="nav-link disabled" href="<?=Url::to('signup')?>"><?=Yii::$app->params['Dictionary']['library']?></a>
    </li>
    <?php } else { ?>
    <li class="nav-item">
        <a class="nav-link <?php echo (Yii::$app->controller->route == 'site/signup') ? 'active background-color2 text-color3' : 'text-color2'?>" href="<?=Url::to('signup')?>"><?=Yii::$app->params['Dictionary']['library']?></a>
    </li>
    <?php } ?>
</ul>

<div class="site-container background-color2 radi-tr-15 radi-b-15">

    <div class="container-fluid pb-4 pr-4 pl-4">
        <!-- Page Heading -->
        <div class="mb-4">
                <h4 class="pt-4">Latest Updates</h4>
            </div>
            <!-- Approach -->
            <div class="background-color3 radi-all-15">
                <div class="card-body">
                    <div class="table-responsive p-1">
                        <table class="table table-bordered table-striped" id="table" width="100%">
                            <thead>
                                <tr>
                                    <th>Descrição</th>
                                    <th>Tipo</th>
                                    <th>Ano académico</th>
                                    <th style="max-width:120px; min-width:120px;">Núm. de fases</th>
                                    <th style="max-width:80px; min-width:80px;">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>teste</td>
                                    <td>teste</td>
                                    <td>teste</td>
                                    <td>teste</td>
                                    <td class="text-center align-middle">
                                        <a href="#" class="btn btn-sm btn-outline-success" title="Selecionar"><i class="fas fa-check"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>
