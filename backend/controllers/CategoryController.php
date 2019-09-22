<?php


namespace backend\controllers;


use common\models\Category;
use yii\base\Controller;
use yii\helpers\Url;
use yii\web\UrlManager;

class CategoryController extends Controller {
    public function actionIndex(){
        $id = null;
        if (isset($_GET['id']))
        {
            $id = \Yii::$app->request->get('id');
        }

        if ($id == null) {
            $category = new Category();
        } else {
            $category = Category::find()
                ->where(['id' => $id])
                ->one();
        }
        return $this->render('edit', [
            'model' => $category
        ]);
    }

    public function actionCreate(){
        $category=new Category();
        $this->changeCategory($category);

        $this->render('edit',[
            'model'=>$category
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

        $category = Category::findOne(['id'=>$id]);
        $this->changeCategory($category,true);

        $this->render('edit',[
            'model'=>$category,
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
    private function changeCategory(Category $category,$is_update = false){
        if (isset($_POST['Category']))
        {
            $category->name = $_POST['Category']['name'];
            $category->description = $_POST['Category']['description'];
            if ($category->validate() && $category->save()) {
                \Yii::$app->response->redirect(Url::to(['site/index']));
            } else {
                \Yii::$app->session->setFlash('error', 'Sorry, can\'t save category because input data is incorrect.');
            }
        }
    }
}