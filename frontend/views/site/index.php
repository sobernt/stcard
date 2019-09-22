<?php

/* @var $this yii\web\View */

$this->title = 'MI sect';

use yii\widgets\LinkPager; ?>
<div class="site-index">
    <div class="body-content">
            <nav class="navbar navbar-default" role="navigation">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
            <?php foreach ($categories as $category){
                echo $this->render('../category/link', compact('category','category_id'));
            }
            ?>
                    </ul>
                </div>
            </nav>
        <div class="row">
            <div class="body-content col-md-12">
                    <div class="card-deck card-columns col-md-12">
                        <div class="col-md-12">
                            <?php foreach ($cards as $card){
                                echo $this->render('../card/card', compact('card'));
                            }
                            ?>
                        </div>
                    </div>
            </div>
                <?= LinkPager::widget([
                    'pagination' => $pages,
                ]); ?>
        </div>

    </div>
</div>
