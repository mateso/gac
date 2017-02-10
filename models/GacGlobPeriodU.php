<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gac_glob_period_u".
 *
 * @property integer $ID
 * @property integer $fiscal_year
 * @property string $period_description
 * @property string $period_start_date
 * @property string $period_end_date
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
            [['fiscal_year'], 'required'],
//            [['fiscal_year'], 'unique'],
            [['period_description'], 'string'],
            [['fiscal_year', 'closed_flag'], 'integer'],
            [['period_start_date', 'period_end_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'ID' => 'ID',
            'fiscal_year' => 'Fiscal Year',
            'period_description' => 'Period Description',
            'period_start_date' => 'Period Start Date',
            'period_end_date' => 'Period End Date',
            'closed_flag' => 'Status',
        ];
    }

    public static function getFiscalYearDesc($id) {
        $model = self::findOne($id);
        return $model->fiscal_year;
    }

    public static function getPeriodDefinitionByPeriodId($id) {
        $model = self::findOne(['fiscal_year' => $id]);
        if ($model) {
            return $model->period_description . ' ' . date('Y', strtotime($model->period_start_date))
                    . '/' . date('Y', strtotime($model->period_end_date))
                    . ' Which starts from ' . date('F j, Y', strtotime($model->period_start_date))
                    . ' up to ' . date('F j, Y', strtotime($model->period_end_date));
        } else {
            return 'No definition provided';
        }
    }

    public static function getUnapprovedFiscalYearPerEntityCode($entityCode) {
        $approvedFiscalYearModel = GacApprovalStatus::find()->select('FiscalYear')->where(['ApprovedFlag' => 1, 'EntityCode' => $entityCode]);
        $unapprovedFiscalYearModel = GacGlobPeriodU::find()->select('fiscal_year')->where(['not in', 'fiscal_year', $approvedFiscalYearModel]);
        $model = $unapprovedFiscalYearModel->all();
        return $model;
    }

}
