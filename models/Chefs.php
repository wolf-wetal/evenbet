<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Chief extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%chief}}';
    }

    public function getDishes()
    {
        return $this->hasMany(Dish::class, ['chief_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }
}