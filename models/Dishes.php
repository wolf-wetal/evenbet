<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Dishes extends ActiveRecord
{
    public static function tableName()
    {
        return 'dishes';
    }

    public function getChief()
    {
        return $this->hasOne(Chief::class, ['id' => 'chief_id']);
    }

    public function rules()
    {
        return [
            [['chief_id', 'name', 'price'], 'required'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }
}