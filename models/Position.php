<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "position".
 *
 * @property integer $id
 * @property string $position
 * @property integer $department_id
 * @property string $salary
 * @property integer $status
 *
 * @property Employee[] $employees
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position', 'department_id', 'salary', 'status'], 'required'],
            [['department_id'], 'integer'],
            [['position'], 'string', 'max' => 25],
            [['salary'], 'string', 'max' => 15],
            [[ 'status'],'string','max'=>50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'position' => 'Position',
            'department_id' => 'Department ID',
            'salary' => 'Salary',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['position_fk' => 'id']);
    }
}
