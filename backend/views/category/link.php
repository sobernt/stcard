<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="btn-group" role="group">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?=$category->name?>
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li><?= Html::a("Show", ['category/'.$category->id], ['class' => 'dropdown-item']) ?></li>
        <li><?= Html::a("Edit", ['categories/'.$category->id], ['class' => 'dropdown-item']) ?></li>
        <li><?= Html::a('Delete', ['category/'.$category->id.'/delete'], ['class' => 'dropdown-item']) ?></li>
    </ul>
</div>

