<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => '6']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        <?php if($model->id) {?>
        <?= Html::a('Удалить', ['category/'.$model->id.'/delete'], ['class' => 'btn btn-danger']) ?>
        <?php } ?>
    </div>

<?php ActiveForm::end(); ?>
