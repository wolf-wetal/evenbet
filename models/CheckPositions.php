<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class CheckPositions extends ActiveRecord
{
    public static function tableName()
    {
        return 'menu_positions';
    }

    public function getMenu()
    {
        return $this->hasOne(Menus::class, ['id' => 'menu_id']);
    }

    public function rules()
    {
        return [
            [['check_id', 'menu_id', 'quantity', 'price'], 'required'],
            [['check_id', 'menu_id', 'quantity'], 'integer'],
            [['price'], 'number'],
            [['created_at'], 'safe'],
        ];
    }
}