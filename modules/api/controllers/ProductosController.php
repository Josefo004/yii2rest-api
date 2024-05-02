<?php

namespace app\modules\api\controllers;

use app\models\Productos;
use yii;
use yii\filters\AccessControl;
use yii\rest\ActiveController;


/**
 * Default controller for the `api` module
 */
class ProductosController extends ActiveController
{
    public $modelClass = 'app\models\Productos';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'datos',
    ];

    public function init()
    {
        parent::init();
        \Yii::$app->user->enableSession = false;
    }
    
}
