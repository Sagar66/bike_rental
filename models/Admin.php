<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $phone
 * @property string $email
 * @property string $authKey
 * @property string $token
 * @property string $created_at
 * @property string $last_update
 * @property integer $status
 *
 * @property BikeRent[] $bikeRents
 */
class Admin extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username','password', 'phone'], 'required'],
            [['phone', 'status'], 'integer'],
            [['email'],'email'],
            [['created_at', 'last_update'], 'safe'],
            [['username'], 'string', 'max' => 25],
            [['email', 'password'], 'string', 'max' => 45],
            [['authKey'], 'string', 'max' => 50],
            [['token'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'phone' => 'Phone',
            'email' => 'Email',
            'authKey' => 'Auth Key',
            'token' => 'Token',
            'created_at' => 'Created At',
            'last_update' => 'Last Login',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeRents()
    {
        return $this->hasMany(BikeRent::className(), ['admin_fk' => 'id']);
    }
    public static function findIdentity($id)
    {
        return self::findOne($id);
}
    public function getId() {
        return $this->id;
    }
    public function getAuthKey() {
        return $this->authKey;
}
public function validateAuthKey($authKey){
    return $this->authKey===$authKey; 
}
//public function validatePassword($password) {
  //      return $this->password === md5($password);
//}
public static function findIdentityByAccessToken($token, $type = null)
{
//throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    return $this->accessToken;
}
public static function findByUsername($username) {
        return self::findOne(['username' => $username]);
    }
public function validatePassword($password){
    return $this->password === md5($password);
}
} 