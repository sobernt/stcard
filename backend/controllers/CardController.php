<?php


namespace backend\controllers;


use backend\models\Card;
use backend\models\CardImageUpload;
use phpDocumentor\Reflection\Types\Boolean;
use yii\base\Controller;
use yii\web\UploadedFile;

class CardController extends Controller
{
    public function actionIndex(){
        $id=null;
        if(isset($_GET['id'])){
            $id = \Yii::$app->request->get('id');
        }
        if($id==null){
            $card = new Card();
        } else {
            $card = Card::find()
                ->where(['id' => $id])
                ->one();
        }
        return $this->render('cardEdit',[
            'model'=>$card,
            'submodel'=>new CardImageUpload()
        ]);
    }
    public function actionCreate()
    {
        $card = new Card();
        $this->changeCard($card);

        $this->render('cardEdit',[
            'model'=>$card,
            'submodel'=>new CardImageUpload()
        ]);
    }
    public function actionUpdate()
    {
        $id=null;
        if(isset($_GET['id'])){
            $id = \Yii::$app->request->get('id');
        } else{
            throw new \yii\web\NotFoundHttpException;
        }

        $card = Card::findOne(['id'=>$id]);
        $this->changeCard($card,true);

        $this->render('cardEdit',[
            'model'=>$card,
            'submodel'=>new CardImageUpload()
        ]);
    }
    public function actionDelete()
    {
        $id=null;
        if(isset($_GET['id'])){
            $id = \Yii::$app->request->get('id');
        } else{
            throw new \yii\web\NotFoundHttpException;
        }

        $card = Card::findOne(['id'=>$id]);
        if($card->img && file_exists(\Yii::$app->basePath . '/web/uploads/' . $card->img)) {
            unlink(\Yii::$app->basePath . '/web/uploads/' . $card->img);
        }
        $card->delete();
        \Yii::$app->response->redirect('/');
    }
    private function changeCard(Card $card,$is_update = false){
        if (isset($_POST['Card']) && isset($_POST['CardImageUpload']))
        {
            $card->title = $_POST['Card']['title'];
            $card->description = $_POST['Card']['description'];

            $submodel = new CardImageUpload();

            $submodel->image = UploadedFile::getInstance($submodel, 'image');

            if ($submodel->upload()) {
                if($card->img) {
                    unlink(\Yii::$app->basePath . '/web/uploads/' . $card->img);
                }
                $card->img = $submodel->filename;
            }
            if ($card->validate() && $card->save(true,['title','description','img'])) {
                \Yii::$app->response->redirect('/');
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, can\'t save card because input data is incorrect.');
            }
        }
    }
}