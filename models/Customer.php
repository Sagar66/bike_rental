<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property string $full_name
 * @property integer $phone
 * @property string $gender
 * @property string $address
 * @property string $email
 * @property string $license_no
 *
 * @property BikeRent[] $bikeRents
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_name', 'phone', 'gender', 'address', 'email', 'license_no'], 'required'],
            [['phone'], 'integer'],
            [['email'], 'email'],
            [['full_name', 'address', 'email', 'license_no'], 'string', 'max' => 50],
            [['gender'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'phone' => 'Phone',
            'gender' => 'Gender',
            'address' => 'Address',
            'email' => 'Email',
            'license_no' => 'License No',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeRents()
    {
        return $this->hasMany(BikeRent::className(), ['customer-fk' => 'id']);
    }
}
