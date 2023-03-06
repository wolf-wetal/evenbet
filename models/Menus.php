<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Menus extends ActiveRecord
{
    public static function tableName()
    {
        return 'menus';
    }

    public function getCheckPositions()
    {
        return $this->hasMany(CheckPositions::class, ['menu_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }
}