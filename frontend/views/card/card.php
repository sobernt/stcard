<?php
use yii\helpers\Url;
?>
<div class="col-sm-3">
    <div class="card">
        <div class="embed-responsive embed-responsive-4by3">
            <img src="/uploads/<?= $card->img? $card->img:'noimage.png' ?>" class="card-img-top " alt="<?= $card->title ?>" style="width: 100%"/>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?= $card->title ?></h5>
            <p class="card-text"><?= \yii\helpers\StringHelper::truncate($card->description,100,'...'); ?></p>
            <a href="<?=Url::to(['card/'.$card->id])?>" class="btn btn-link">open card</a>
        </div>
        <div class="card-footer">
            <div class="show-count-container">
                <i class="glyphicon glyphicon glyphicon-eye-open"></i>
                <span class="show-count"><?= $card->views ?></span>
            </div>
        </div>
    </div>
</div>