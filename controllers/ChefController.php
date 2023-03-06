<?php

namespace app\controllers;

use Yii;
use yii\rest\Controller;
use app\models\CheckPosition;

class ChefController extends Controller
{
    public function actionPopularChefs($start_date, $end_date)
    {
        $results = Yii::$app->db->createCommand("
            SELECT mp.chef_id, COUNT(*) AS order_count
            FROM check_position cp
            LEFT JOIN menu_position mp ON cp.menu_position_id = mp.id
            WHERE cp.created_at BETWEEN :start_date AND :end_date
            GROUP BY mp.chef_id
            ORDER BY order_count DESC
        ")
            ->bindValue(':start_date', $start_date)
            ->bindValue(':end_date', $end_date)
            ->queryAll();

        return $results;
    }
}
