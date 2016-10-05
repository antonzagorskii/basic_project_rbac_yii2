<?php

namespace app\modules\Backend\controllers;


use Yii;
use yii\web\Controller;

/**
 * Default controller for the `orders` module
 */
class OrdersController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionNew()
    {
        $model = new \app\modules\Backend\models\Orders();

        if(Yii::$app->request->post()){

            if ($model->load(Yii::$app->request->post())) {

                if ($model->validate()){
                    $model->save();

                    \Yii::$app->getSession()->setFlash('success', 'Пользователь добавлен');

                    //return $this->redirect(Url::to(["/".Yii::$app->controller->module->id."/orders/site/new"]));
                }
            }
        }



        return $this->render('edit', [
            'model' => $model,
            'moduleName' => Yii::$app->controller->module->id
        ]);
    }
}
