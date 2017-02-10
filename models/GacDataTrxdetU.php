<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gac_data_trxdet_u".
 *
 * @property string $TransCtrlNum
 * @property string $EntityCode
 * @property string $BookID
 * @property string $GFSCode
 * @property integer $ClassificationCode
 * @property integer $FiscalYear
 * @property integer $EliminationFlag
 * @property double $ApprovedBudget
 * @property double $Reallocation
 * @property double $Actual
 * @property double $ActualCr
 * @property double $ActualDr
 * @property integer $SubchapterId
 * @property string $EntryDate
 * @property integer $EntryUser
 * @property integer $ApprovedFlag
 * @property string $ApprovedDate
 * @property integer $ApprovalUser
 * @property integer $PostedFlag
 * @property integer $ClosedFlag
 * @property integer $IsVoided
 * @property integer $VoidedBy
 * @property string $VoidedDate
 */
class GacDataTrxdetU extends \yii\db\ActiveRecord {

    public $SubchapterId;
    public $ItemCode;
    public $Actual;
    public $GFSCodeDesc;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'gac_data_trxdet_u';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['FiscalYear', 'GFSCode'], 'required'],
            [['Actual'], 'required', 'on' => 'create'],
//            ['EliminationFlag', 'required',
//                'when' => function($model) {
//                    return GacGfsListV::getChapterCodebyGfsmCode($model->GFSCode) == 1;
//                },
//                'whenClient' => "function (attribute, value){
//                 return ($('#gacdatatrxdetu-subchapterid').val()) < 5}",
//                'message' => 'Select one of the two options above'],
            [['EliminationFlag'], 'required'],
            [['TransCtrlNum'], 'unique'],
            [['TransCtrlNum', 'EntityCode', 'BookID', 'GFSCode'], 'string'],
            [['ClassificationCode', 'FiscalYear', 'EntryUser', 'ApprovedFlag', 'ApprovalUser', 'PostedFlag', 'ClosedFlag', 'VoidedBy'], 'integer'],
            [['ApprovedBudget', 'Reallocation', 'Actual', 'ActualCr', 'ActualDr', 'EliminationFlag'], 'number'],
            [['EntryDate', 'ApprovedDate', 'SubchapterId', 'ItemCode', 'ClassificationCode', 'GFSCodeDesc', 'IsVoided', 'VoidedDate'], 'safe'],
            ['GFSCode', 'exist', 'targetClass' => 'app\models\GacGfsListV', 'targetAttribute' => 'GFSMCode']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'TransCtrlNum' => 'Trans Ctrl Num',
            'EntityCode' => 'Entity Code',
            'BookID' => 'Book ID',
            'GFSCode' => 'GFS Code',
            'ClassificationCode' => 'Classification Code',
            'FiscalYear' => 'Fiscal Year',
            'EliminationFlag' => 'Elimination Flag',
            'ApprovedBudget' => 'Approved Budget',
            'Reallocation' => 'Reallocation/Adjustment',
            'Actual' => 'Actual',
            'ActualCr' => 'Actual Credit',
            'ActualDr' => 'Actual Debit',
            'EntryDate' => 'Entry Date',
            'EntryUser' => 'Entry User',
            'ApprovedFlag' => 'Approved Flag',
            'ApprovedDate' => 'Approved Date',
            'ApprovalUser' => 'Approval User',
            'PostedFlag' => 'Posted Flag',
            'ClosedFlag' => 'Closed Flag',
            'GFSSubchapterCode' => 'GFS Subchapter',
            'GFSItemCode' => 'GFS Item',
            'GFSCodeDesc' => 'GFS Description',
            'SubchapterId' => 'Sub Chapter',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGacGfsListU() {
        return $this->hasOne(GacGfsListU::className(), ['GFSTransaction' => 'GFSCode']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGacGfsListV() {
        return $this->hasOne(GacGfsListV::className(), ['GFSMCode' => 'GFSCode']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiscalYear() {
        return $this->hasOne(GacGlobPeriodU::className(), ['ID' => 'FiscalYear']);
    }

    public static function getItemDescByTrxID($id) {
        $model = self::findOne(['id' => $id]);
        $gfsItem = GacGfsListV::findOne(['GFSMCode' => $model->GFSCode]);
        return $gfsItem->ItemShortDescription;
    }

    public static function getItemCodeByTrxId($id) {
        $model = GacDataTrxdetU::findOne(['id' => $id]);
        $gfsItem = GacGfsListV::findOne(['GFSMCode' => $model->GFSCode]);
        return $gfsItem->ItemCode;
    }

    public static function getSubchapterDescByTrxID($id) {
        $model = self::findOne(['id' => $id]);
        $gfsSubChapter = GacGfsListV::findOne(['GFSMCode' => $model->GFSCode]);
        return $gfsSubChapter->SubChapterDescription;
    }

    public static function getSubchapterIdByTrxId($id) {
        $model = GacDataTrxdetU::findOne(['id' => $id]);
        $gfsList = GacGfsListV::findOne(['GFSMCode' => $model->GFSCode]);
        $gfsSubChapter = GacGfsSubchapterU::findOne(['ChapterCode' => $gfsList->ChapterCode, 'SubChapterCode' => $gfsList->SubChapterCode]);
        return $gfsSubChapter->ID;
    }

    public static function generateTransCtrlNumber($id) {
        $model = self::find()->orderBy('ID DESC')->one();
        $fiscal_year = substr($id, -2);
        if ($model) {
            return 'TRX' . $fiscal_year . str_pad(((int) substr($model->TransCtrlNum, -6) + 1), 6, 0, STR_PAD_LEFT);
        }
        return 'TRX' . $fiscal_year . '000001';
    }

    public static function getGFSCodeDesc($id) {
        $model = GacGfsListV::findOne(['GFSMCode' => $id]);
        return $model->ItemDescription;
    }

}
