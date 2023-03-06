<?php
namespace app\controllers;

use Yii;
use yii\rest\Controller;
use app\models\Check;
use app\models\CheckPosition;

class CheckController extends Controller
{

    public function actionCreate()
    {
        $check = new Check();
        $check->created_at = time();

        if ($check->save()) {
            Yii::$app->response->statusCode = 201; // Created
            return [
                'id' => $check->id,
                'created_at' => $check->created_at,
            ];
        } else {
            Yii::$app->response->statusCode = 422; // Unprocessable Entity
            return $check->errors;
        }
    }

    public function actionAddPosition($check_id, $menu_position_id, $quantity = 1)
    {
        $check = Check::findOne($check_id);
        if (!$check) {
            Yii::$app->response->statusCode = 404; // Not Found
            return ['message' => 'Check not found'];
        }

        $menuPosition = MenuPosition::findOne($menu_position_id);
        if (!$menuPosition) {
            Yii::$app->response->statusCode = 404; // Not Found
            return ['message' => 'Menu position not found'];
        }

        $checkPosition = new CheckPosition();
        $checkPosition->check_id = $check_id;
        $checkPosition->menu_position_id = $menu_position_id;
        $checkPosition->quantity = $quantity;

        if ($checkPosition->save()) {
            Yii::$app->response->statusCode = 201; // Created
            return [
                'id' => $checkPosition->id,
                'check_id' => $checkPosition->check_id,
                'menu_position_id' => $checkPosition->menu_position_id,
                'quantity' => $checkPosition->quantity,
            ];
        } else {
            Yii::$app->response->statusCode = 422; // Unprocessable Entity
            return $checkPosition->errors;
        }
    }
}