<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gac_entity_sector_u".
 *
 * @property integer $SectorID
 * @property string $SectorDescription
 */
class GacEntitySectorU extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'gac_entity_sector_u';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['SectorID'], 'required'],
            [['SectorID'], 'integer'],
            [['SectorDescription'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'SectorID' => 'Sector ID',
            'SectorDescription' => 'Sector Description',
        ];
    }

    public static function getSectorDescBySectorId($id) {
        $model = self::findOne($id);
        return $model->SectorDescription;
    }

}
