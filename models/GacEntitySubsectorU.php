<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gac_entity_subsector_u".
 *
 * @property integer $SubSectorID
 * @property string $SubSectorDescription
 * @property integer $SectorID
 */
class GacEntitySubsectorU extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'gac_entity_subsector_u';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['SubSectorID'], 'required'],
            [['SubSectorID', 'SectorID'], 'integer'],
            [['SubSectorDescription'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'SubSectorID' => 'Sub Sector ID',
            'SubSectorDescription' => 'Sub Sector Description',
            'SectorID' => 'Sector ID',
        ];
    }

    public static function getSubSectorDescBySubSectorId($id) {
        $model = self::findOne($id);
        return $model->SubSectorDescription;
    }

}
