<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gac_glob_period_u".
 *
 * @property integer $ID
 * @property string $period_type
 * @property integer $fiscal_year
 * @property string $period_description
 * @property string $period_start_date
 * @property string $period_end_date
 * @property integer $initialized_flag
 * @property integer $closed_flag
 */
class GacGlobPeriodU extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'gac_glob_period_u';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['period_type', 'period_description'], 'string'],
            [['fiscal_year', 'initialized_flag', 'closed_flag'], 'integer'],
            [['period_start_date', 'period_end_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'ID' => 'ID',
            'period_type' => 'Period Type',
            'fiscal_year' => 'Fiscal Year',
            'period_description' => 'Period Description',
            'period_start_date' => 'Period Start Date',
            'period_end_date' => 'Period End Date',
            'initialized_flag' => 'Initialized Flag',
            'closed_flag' => 'Closed Flag',
        ];
    }

    public static function getFiscalYearDesc($id) {
        $model = self::findOne($id);
        return $model->fiscal_year;
    }

    public static function getPeriodDefinitionByPeriodId($id) {
        $model = self::findOne($id);
        if ($model) {
            return $model->period_description . ' ' . date('Y', strtotime($model->period_start_date))
                    . '/' . date('Y', strtotime($model->period_end_date))
                    . ' Which starts from ' . date('F j, Y', strtotime($model->period_start_date))
                    . ' up to ' . date('F j, Y', strtotime($model->period_end_date));
        } else {
            return 'No definition provided';
        }
    }

}
