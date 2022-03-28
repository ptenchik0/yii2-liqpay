<?php

namespace reactlogic\liqpay\controllers;

use yii\web\Controller;

class LiqpayController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //var_dump($this);
        return $this->render('index');
    }

}
