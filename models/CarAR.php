<?php
declare(strict_types=1);

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class CarAR extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'car';
    }

    public function rules(): array
    {
        return [
            [['title', 'description', 'price', 'photo_url', 'contacts'], 'required'],
            [['title', 'photo_url', 'contacts'], 'string', 'max' => 255],
            [['description'], 'string'],
            [['price'], 'number'],
            [['created_at'], 'safe'],
        ];
    }

    public function getOption(): ActiveQuery
    {
        return $this->hasOne(CarOptionAR::class, ['car_id' => 'id']);
    }
}
