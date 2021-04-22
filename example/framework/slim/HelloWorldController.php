<?php

namespace app\controllers;

use yii\web\Controller;

class HelloWorldController extends Controller
{
    public function actionHello1()
    {
        return "Hello World";
    }

    public function actionHello2()
    {
        return $this->render('message', [
            'message' => "Hello World in view",
        ]);
    }

    public function actionHello($message)
    {
        return $this->render('message', [
            'message' => $message,
        ]);
    }
}
