<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use app\models\GacEntityListV;
use app\models\GacEntityListU;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $phone
 * @property integer $login_counts
 * @property string $last_login_date
 * @property integer $failed_login_attempts
 * @property string $auth_key
 * @property string $last_password_update_date
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $status
 * @property string $password_reset_token
 * @property integer $institutional_code
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface {

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;

    public $entity_sector_id;
    public $entity_sub_sector_id;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'gac_user_u';
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['username', 'password_hash', 'institutional_code'], 'required'],
            [['status', 'login_counts', 'failed_login_attempts', 'created_by'], 'integer'],
            [['last_login_date', 'last_password_update_date', 'created_at', 'entity_sector_id', 'entity_sub_sector_id', 'institutional_code', 'updated_at', 'firstname', 'lastname'], 'safe'],
            [['username', 'password_hash', 'email', 'phone', 'auth_key', 'password_reset_token'], 'string', 'max' => 255],
            [['username'], 'unique'],
            ['institutional_code', 'exist', 'targetClass' => 'app\models\GacEntityListV', 'targetAttribute' => 'InstitutionalCode']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'User ID',
            'username' => 'Username',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'password_hash' => 'Password',
            'email' => 'Email',
            'phone' => 'Phone',
            'status' => 'Status',
            'login_counts' => 'Login Counts',
            'last_login_date' => 'Last Login Date',
            'failed_login_attempts' => 'Failed Login Attempts',
            'auth_key' => 'Auth Key',
            'last_password_update_date' => 'Last Password Update Date',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'password_reset_token' => 'Password Reset Token',
            'institutional_code' => 'Institution Name',
            'entity_sector_id' => 'Entity Sector',
            'entity_sub_sector_id' => 'Entity Subsector'
        ];
    }

    /** INCLUDE USER LOGIN VALIDATION FUNCTIONS* */

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    /* modified */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return static::findOne(['username' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param  string      $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token) {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
                    'password_reset_token' => $token,
                    'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token) {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
//        return $this->password === sha1($password);
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken() {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken() {
        $this->password_reset_token = null;
    }

    public static function getEntitySectorIdByUserId($id) {
        $model = self::findOne(['id' => $id]);
        $entitySector = GacEntityListV::findOne(['InstitutionalCode' => $model->institutional_code]);
        return $entitySector->SectorID;
    }

    public static function getEntitySubSectorIdByUserId($id) {
        $model = self::findOne(['id' => $id]);
        $entitySubSector = GacEntityListV::findOne(['InstitutionalCode' => $model->institutional_code]);
        return $entitySubSector->SubSectorID;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGacEntityListU() {
        return $this->hasOne(GacEntityListU::className(), ['InstitutionalCode' => 'institutional_code']);
    }

    public function getFullName() {
        return $this->firstname.' '.$this->lastname;
    }

}
