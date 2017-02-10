<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gac_data_trx_v".
 *
 * @property integer $FiscalYear
 * @property string $InstitutionalCode
 * @property string $EntityCode
 * @property string $EntityDescription
 * @property integer $NumTransaction
 * @property double $ActualDr
 * @property double $ActualCr
 * @property double $Balance
 * @property integer $ApprovedFlag
 * @property string $ApprovedDate
 * @property integer $PostedFlag
 * @property string $DatePosted
 * @property integer $ClosedFlag
 */
class GacDataTrxV extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'gac_data_trx_v';
    }

    public static function primaryKey() {
        return ['InstitutionalCode', 'FiscalYear'];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['FiscalYear', 'NumTransaction', 'ApprovedFlag', 'PostedFlag', 'ClosedFlag'], 'integer'],
            [['InstitutionalCode', 'EntityCode', 'EntityDescription'], 'string'],
            [['ActualDr', 'ActualCr'], 'required'],
            [['ActualDr', 'ActualCr', 'Balance'], 'number'],
            [['ApprovedDate', 'DatePosted'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'FiscalYear' => 'Fiscal Year',
            'InstitutionalCode' => 'Institutional Code',
            'EntityCode' => 'Entity Code',
            'EntityDescription' => 'Entity Description',
            'NumTransaction' => 'Num Transaction',
            'ActualDr' => 'Actual Dr',
            'ActualCr' => 'Actual Cr',
            'Balance' => 'Balance',
            'ApprovedFlag' => 'Approved',
            'ApprovedDate' => 'Approved Date',
            'PostedFlag' => 'Posted Flag',
            'DatePosted' => 'Date Posted',
            'ClosedFlag' => 'Closed Flag',
        ];
    }

}
