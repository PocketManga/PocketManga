<?php
    use yii\helpers\Url;
?>

<div class="background-color2 radi-tr-15 radi-b-15">
    <div class="container-fluid pb-4 pr-4 pl-4">
        <div class="row">
            <div class="col">
                <!-- Page Heading -->
                <div class="mb-4">
                    <h4 class="pt-4"><?=$Manga?></h4>
                </div>
                <!-- Approach -->
                <div class="background-color3 radi-all-15 p-4">
                    <?php echo $this->render('partials/view_type1', ['Mangas' => $Mangas,'PaginaAtual' => $PaginaAtual,'NumPaginas' => $NumPaginas,]); ?>
                </div>
            </div>
            <div class="col-md-3 mt-4">
                <?php echo $this->render('layouts/genre_list', ['Categories' => $Categories]); ?>
            </div>
        </div>
    </div>
</div>

<?php /*
<div class="manga-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->IdManga], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->IdManga], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'IdManga',
            'Title',
            'AlternativeTitle',
            'OriginalTitle',
            'Status',
            'OneShot',
            'R18',
            'Language',
            'SrcImage',
            'ReleaseDate',
            'Updated',
            'Description:ntext',
            'Slug',
            'Manager_Id',
        ],
    ]) ?>
*/?>
</div>
