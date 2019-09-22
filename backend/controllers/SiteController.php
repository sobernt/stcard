<?php
namespace backend\controllers;

use common\models\Card;
use common\models\Category;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $category_id = null;
        $find = [];
        if (isset($_GET['id']))
        {
            $category_id = \Yii::$app->request->get('id');
            $find = ['category_id'=>$category_id];
        }
        $cardQ = Card::find()->where($find);
        $pages = new Pagination([
            'totalCount' => $cardQ->count(),
            'pageSize'=>6,
            'pageSizeParam' => false,
            'forcePageParam' => false,
        ]);
        $categories = Category::find()->orderBy("name ASC")->all();
        $cards = $cardQ
            ->orderBy(['id'=>SORT_DESC])
            ->limit($pages->limit)
            ->offset($pages->offset)
            ->all();
        return $this->render('index',compact('cards', 'pages','categories','category_id'));
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
