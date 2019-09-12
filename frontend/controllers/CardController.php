<?php


namespace frontend\controllers;


use common\models\Card;
use yii\web\Controller;

class CardController extends Controller
{
    public function actionIndex(){
        if(isset($_GET['id'])){
            $id = \Yii::$app->request->get('id');
        } else{
            throw new \yii\web\NotFoundHttpException;
        }
        $card = Card::find()
                ->where(['id' => $id])
                ->one();

        $card->views += 1;
        $card->save();

        return $this->render('card_page',[
            'card'=>$card,
        ]);
    }
}