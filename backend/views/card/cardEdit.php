<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'title') ?>

<?= $form->field($model, 'description')->textarea(['rows' => '6']) ?>

<?= $form->field($model, 'category_id', [
    'template' => '
                <div class="input-group">
                    {input}
                    <div class="input-group-btn">
                        '.Html::a('+', ['categories/'], ['class' => 'btn btn-primary']).'
                    </div>
                </div>
                {error}',
    'inputOptions' => [
        'placeholder' => 'select category',
        'class'=>'form-control',
    ]])->dropDownList(
    ArrayHelper::map($categories,'id','name'),['prompt' => 'Выберите категорию','class'=>'form-control']);
?>
<div class="row col-md-12">
    <div class="col-md-1">
        <div class="embed-responsive embed-responsive-4by3 ">
            <img src="/uploads/<?= $model->img? $model->img:'noimage.png' ?>" class="card-img-top" alt="<?= $model->title ?>" style="width: 100%">
        </div>
    </div>
    <div class="col-md-5">
        <?= $form->field($submodel, 'image')->fileInput(["size"=>5,"accept"=>"image/jpeg,image/png"]) ?>
    </div>
</div>



<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    <?php if($model->id) {?>
    <?= Html::a('Удалить', ['card/'.$model->id.'/delete'], ['class' => 'btn btn-danger']) ?>
    <?php } ?>
</div>

<?php ActiveForm::end(); ?>
