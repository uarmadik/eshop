<?php
/**
 * Created by PhpStorm.
 * User: Ihor-PC
 * Date: 15.01.2018
 * Time: 21:30
 */

namespace app\modules\admin\controllers;


use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


class AppAdminController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
//                'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
//                        'actions' => ['login', 'signup'],
//                        'roles' => ['?'],
                        'roles' => ['@'],
                    ],

                ],
            ],
        ];
    }
}