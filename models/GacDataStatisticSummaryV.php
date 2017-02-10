<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gac_data_statistic_summary_v".
 *
 * @property integer $Total_Entity
 * @property integer $Entity_Entered
 * @property integer $Entity_Approved
 * @property integer $Entity_Balance
 * @property integer $Entity_Posted
 */
class GacDataStatisticSummaryV extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'gac_data_statistic_summary_v';
    }

    public static function primaryKey() {
        return ['Total_Entity'];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['Total_Entity', 'Entity_Entered', 'Entity_Approved', 'Entity_Balance', 'Entity_Posted'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'Total_Entity' => 'Total  Entity',
            'Entity_Entered' => 'Entity  Entered',
            'Entity_Approved' => 'Entity  Approved',
            'Entity_Balance' => 'Entity  Balance',
            'Entity_Posted' => 'Entity  Posted',
        ];
    }

}
