<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Admin page';
?>
<nav class="site-index col-md-12">
    
    <div class="jumbotron">
        <h1><?=$this->title?></h1>

        <p class="lead">You can <a href="<?=Url::to(['card/index'])?>">add new card</a> <?=count($cards)>0?'or edit some cards':''?>.</p>

        <div class="btn-group btn-group-sm" role="group">
            <li class="<?=$category_id==null?'active':''?> btn btn-default">
                <?= Html::a("All", ['/'], ['class' => '']) ?>
            </li>
            <?php foreach ($categories as $category){
                echo $this->render('../category/link', compact('category','category_id'));
            }
            ?>
            <li class="btn btn-primary">
                <?= Html::a("+", ['/categories'], ['class' => 'text-light','style'=>'color:#fff!important;text-decoration:none;']) ?>
            </li>
        </div>
    </div>

    <div class="body-content col-md-12">
            <div class="card-deck col-md-12">
                <?php foreach ($cards as $card){
                    echo $this->render('../card/card', compact('card'));
                }
                ?>
            </div>
        <?= LinkPager::widget([
            'pagination' => $pages,
        ]); ?>
    </div>
</div>
