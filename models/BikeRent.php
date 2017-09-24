<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bike_rent".
 *
 * @property integer $id
 * @property integer $bike_fk
 * @property integer $customer_fk
 * @property string $start_from
 * @property string $+86400end_to
 * @property string $purpose
 * @property integer $admin_fk
 * @property integer $status
 *
 * @property Admin $adminFk
 * @property Bike $bikeFk
 * @property Customer $customerFk
 */
class BikeRent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bike_rent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bike_fk', 'customer_fk', 'start_from', 'end_to', 'purpose', 'admin_fk'], 'required'],
            [['bike_fk', 'customer_fk', 'admin_fk'], 'integer'],
            [[ 'purpose'], 'string', 'max' => 25],
            [['admin_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['admin_fk' => 'id']],
            [['bike_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Bike::className(), 'targetAttribute' => ['bike_fk' => 'id']],
            [['customer_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_fk' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bike_fk' => 'This Bike',
            'customer_fk' => 'This Customer',
            'start_from' => 'From This Date',
            'end_to' => 'Up to This Date',
            'purpose' => 'Purpose',
            'admin_fk' => 'Rented By',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdminFk()
    {
        return $this->hasOne(Admin::className(), ['id' => 'admin_fk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeFk()
    {
        return $this->hasOne(Bike::className(), ['id' => 'bike_fk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerFk()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_fk']);
    }
}
