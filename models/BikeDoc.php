<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bike_doc".
 *
 * @property integer $id
 * @property string $document_type
 * @property string $document
 * @property integer $bike_fk
 *
 * @property Bike $bikeFk
 */
class BikeDoc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'bike_doc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'bike_fk'], 'required'],
            [['bike_fk'], 'integer'],
            [['document_type', 'document'], 'string', 'max' => 100],
            [['document'],'file'],
            [['bike_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Bike::className(), 'targetAttribute' => ['bike_fk' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'document_type' => 'Document Type',
            'document' => 'Document',
            'bike_fk' => 'Bike Fk',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeFk()
    {
        return $this->hasOne(Bike::className(), ['id' => 'bike_fk']);
    }
}
