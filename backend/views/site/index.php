<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Admin page';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?=$this->title?></h1>

        <p class="lead">You can <a href="<?=Url::to(['card/index'])?>">add new card</a> <?=count($cards)>0?'or edit some cards':''?>.</p>

    </div>

    <div class="body-content">
        <div class="row">
            <div class="card-deck col-md-12">
                <?php foreach ($cards as $card){
                    echo $this->render('../card/card', compact('card'));
                }
                ?>
            </div>
        </div>
        <?= LinkPager::widget([
            'pagination' => $pages,
        ]); ?>

    </div>
</div>
