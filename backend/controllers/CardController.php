<?php


namespace backend\controllers;


use common\models\Card;
use backend\models\CardImageUpload;
use common\models\Category;
use yii\base\Controller;
use yii\helpers\Url;
use yii\web\UploadedFile;
use yii\web\UrlManager;

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
        $categories = Category::find()->all();
        return $this->render('cardEdit',[
            'model'=>$card,
            'submodel'=>new CardImageUpload(),
            'categories'=>$categories
        ]);
    }
    public function actionCreate()
    {
        $card = new Card();
        $this->changeCard($card);

        $categories = Category::find()->all();

        $this->render('cardEdit',[
            'model'=>$card,
            'submodel'=>new CardImageUpload(),
            'categories'=>$categories
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


        $categories = Category::find()->all();
        $this->render('cardEdit',[
            'model'=>$card,
            'submodel'=>new CardImageUpload(),
            'categories'=>$categories
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
        \Yii::$app->response->redirect(Url::to(['site/index']));
    }
    private function changeCard(Card $card,$is_update = false){
        if (isset($_POST['Card']) && isset($_POST['CardImageUpload']))
        {
            $card->title = $_POST['Card']['title'];
            $card->description = $_POST['Card']['description'];
            $card->category_id = $_POST['Card']['category_id'];

            $submodel = new CardImageUpload();

            $submodel->image = UploadedFile::getInstance($submodel, 'image');

            if ($submodel->upload()) {
                if($card->img) {
                    unlink(\Yii::$app->basePath . '/web/uploads/' . $card->img);
                }
                $card->img = $submodel->filename;
            }
            if ($card->validate() && $card->save(true,['title','description','img','category_id'])) {
                \Yii::$app->response->redirect(Url::to(['site/index']));
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, can\'t save card because input data is incorrect.');
            }
        }
    }
}