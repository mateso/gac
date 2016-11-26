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
        return ['FiscalYear', 'InstitutionalCode'];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['FiscalYear', 'NumTransaction', 'ApprovedFlag', 'PostedFlag', 'ClosedFlag'], 'integer'],
            [['InstitutionalCode', 'EntityCode', 'EntityDescription'], 'string'],
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
            'NumTransaction' => 'Number of Transactions',
            'ApprovedFlag' => 'Approved Flag',
            'ApprovedDate' => 'Approved Date',
            'PostedFlag' => 'Posted Flag',
            'DatePosted' => 'Date Posted',
            'ClosedFlag' => 'Closed Flag',
        ];
    }

}
