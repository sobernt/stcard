<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<li class="<?=$category_id==$category->id?'active':''?>"><?= Html::a($category->name, [$category->id==null?'':'category/'.$category->id], ['class' => 'btn btn-link']) ?></li>