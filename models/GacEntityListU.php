<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gac_entity_list_u".
 *
 * @property integer $ID
 * @property integer $SectorID
 * @property integer $SubSectorID
 * @property string $InstitutionalCode
 * @property string $VoteCode
 * @property string $EntityCode
 * @property string $EntityDescription
 * @property integer $ActiveFlag
 * @property string $DateCreated
 * @property integer $UserCreated
 * @property string $DateModified
 * @property integer $UserModified
 * @property string $ContactPerson
 * @property string $ContactNumber
 * @property string $Region
 */
class GacEntityListU extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'gac_entity_list_u';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['SectorID', 'SubSectorID', 'ActiveFlag', 'UserCreated', 'UserModified'], 'integer'],
            [['SectorID', 'SubSectorID', 'InstitutionalCode'], 'required'],
            [['InstitutionalCode', 'VoteCode', 'EntityCode', 'EntityDescription', 'ContactPerson', 'ContactNumber', 'Region'], 'string'],
            [['DateCreated', 'DateModified'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'ID' => 'ID',
            'SectorID' => 'Sector',
            'SubSectorID' => 'Sub Sector',
            'InstitutionalCode' => 'Institutional Code',
            'VoteCode' => 'Vote Code',
            'EntityCode' => 'Entity Code',
            'EntityDescription' => 'Entity Description',
            'ActiveFlag' => 'Active Flag',
            'DateCreated' => 'Date Created',
            'UserCreated' => 'User Created',
            'DateModified' => 'Date Modified',
            'UserModified' => 'User Modified',
            'ContactPerson' => 'Contact Person',
            'ContactNumber' => 'Contact Number',
            'Region' => 'Region',
        ];
    }

    public static function getEntityDesc($id) {
        $model = self::findOne(['InstitutionalCode' => $id]);
        return $model->EntityDescription;
    }

}
