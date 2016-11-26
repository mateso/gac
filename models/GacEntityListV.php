<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gac_entity_list_v".
 *
 * @property integer $SectorID
 * @property string $SectorDescription
 * @property integer $SubSectorID
 * @property string $SubSectorDescription
 * @property string $InstitutionalCode
 * @property string $EntityCode
 * @property string $EntityDescription
 */
class GacEntityListV extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gac_entity_list_v';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SectorID', 'SubSectorID'], 'required'],
            [['SectorID', 'SubSectorID'], 'integer'],
            [['SectorDescription', 'SubSectorDescription', 'InstitutionalCode', 'EntityCode', 'EntityDescription'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SectorID' => 'Sector ID',
            'SectorDescription' => 'Sector Description',
            'SubSectorID' => 'Sub Sector ID',
            'SubSectorDescription' => 'Sub Sector Description',
            'InstitutionalCode' => 'Institutional Code',
            'EntityCode' => 'Entity Code',
            'EntityDescription' => 'Entity Description',
        ];
    }
}
