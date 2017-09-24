<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rent".
 *
 * @property integer $id
 * @property integer $bike_id
 * @property string $periods
 * @property integer $price
 *
 * @property Bike $bike
 */
class Rent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bike_id', 'periods', 'price'], 'required'],
            [['bike_id', 'price'], 'integer'],
            [['periods'], 'string', 'max' => 15],
            [['bike_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bike::className(), 'targetAttribute' => ['bike_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bike_id' => 'Bike ID',
            'periods' => 'Periods',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBike()
    {
        return $this->hasOne(Bike::className(), ['id' => 'bike_id']);
    }
}
