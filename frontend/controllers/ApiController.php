<?php


namespace frontend\controllers;


use yii\web\Controller;

class ApiController extends Controller
{
    public function __construct($id, $module, $config = [])
    {


        $this->enableCsrfValidation = false;
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        parent::__construct($id, $module, $config);
    }


}