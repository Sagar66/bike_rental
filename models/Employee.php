<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $id
 * @property string $full_name
 * @property string $address
 * @property string $gender
 * @property integer $phone
 * @property string $email
 * @property integer $department_fk
 * @property integer $position_fk
 * @property string $document_type
 * @property string $document
 * @property string $status
 *
 * @property Department $departmentFk
 * @property Position $positionFk
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
public $file;
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_name', 'address', 'gender', 'phone', 'email', 'status'], 'required'],
            [['phone', 'department_fk', 'position_fk'], 'integer'],
            [['full_name', 'gender', 'document_type', 'document'], 'string', 'max' => 50],
            [['address','document', 'email'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 15],
            [['document'],'file'],
            [['department_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_fk' => 'id']],
            [['position_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['position_fk' => 'id']],
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
            'address' => 'Address',
            'gender' => 'Gender',
            'phone' => 'Phone',
            'email' => 'Email',
            'department_fk' => 'Department',
            'position_fk' => 'Position',
            'document_type' => 'Document Type',
            'document' => 'Document',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartmentFk()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_fk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPositionFk()
    {
        return $this->hasOne(Position::className(), ['id' => 'position_fk']);
    }
}
