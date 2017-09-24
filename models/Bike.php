<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "bike".
 *
 * @property integer $id
 * @property string $no_plate
 * @property string $eng_num
 * @property string $brand
 * @property string $model
 * @property string $name
 * @property string $color
 * @property string $details
 * @property string $images
 * @property string $is_maintained
 * @property string $status
 *
 * @property BikeDoc[] $bikeDocs
 * @property BikeRent[] $bikeRents
 * @property Rent[] $rents
 */
class Bike extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'bike';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_plate', 'eng_num','color', 'details', 'is_maintained', 'status'], 'required'],
            [['no_plate', 'eng_num', 'brand', 'model', 'name', 'color', 'status'], 'string', 'max' => 25],
            [['details'], 'string', 'max' => 150],
            [['images'], 'string', 'max' => 500],
            [['images'],'file','extensions'=>'png,gif,jpg,jpeg', 'on' => 'imageUploaded'],
            [['is_maintained'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_plate' => 'No Plate',
            'eng_num' => 'Eng Num',
            'brand' => 'Brand',
            'model' => 'Model',
            'name' => 'Name',
            'color' => 'Color',
            'details' => 'Details',
            'images' => 'Image',
            'is_maintained' => 'Is Maintained',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeDocs()
    {
        return $this->hasMany(BikeDoc::className(), ['bike_fk' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeRents()
    {
        return $this->hasMany(BikeRent::className(), ['bike_fk' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRents()
    {
        return $this->hasMany(Rent::className(), ['bike_id' => 'id']);
    }
}
