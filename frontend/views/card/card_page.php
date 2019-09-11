<?php
use yii\helpers\Url;
?>
<div class="col-sm-5">
    <div class="card">
        <div class="embed-responsive embed-responsive-4by3">
            <img src="/uploads/<?= $card->img? $card->img:'noimage.png' ?>" class="card-img-top " alt="<?= $card->title ?>" style="width: 100%"/>
        </div>
        <div class="card-body">
            <h3 class="card-title font-weight-bold"><?= $card->title ?></h3>
            <p class="card-text"><?= $card->description ?></p>
        </div>
        <div class="card-footer">
            <div class="show-count-container">
                <i class="glyphicon glyphicon glyphicon-eye-open"></i>
                <span class="show-count"><?= $card->views ?></span>
            </div>
        </div>
    </div>
</div>