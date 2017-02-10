<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gac_approval_status".
 *
 * @property integer $ApprovalStatusId
 * @property string $EntityCode
 * @property string $FiscalYear
 * @property integer $ApprovedFlag
 * @property integer $PostedFlag
 */
class GacApprovalStatus extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'gac_approval_status';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['EntityCode', 'FiscalYear'], 'string'],
            [['ApprovedFlag', 'PostedFlag'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'ApprovalStatusId' => 'Approval Status ID',
            'EntityCode' => 'Entity Code',
            'FiscalYear' => 'Fiscal Year',
            'ApprovedFlag' => 'Approved Flag',
            'PostedFlag' => 'Posted Flag',
        ];
    }

    public static function updateApprovalStatus($fiscalYear, $entityCode, $approvalType) {
        $model = GacApprovalStatus::find()->where(['FiscalYear' => $fiscalYear, 'EntityCode' => $entityCode])->one();

        if ($model) {
            switch ($approvalType) {
                case "Approve":
                    $model->ApprovedFlag = 1;
                    break;
                case "Disapprove":
                    $model->ApprovedFlag = 0;
                    break;
                case "Post":
                    $model->PostedFlag = 1;
                    break;
                case "Unpost":
                    $model->PostedFlag = 0;
                    break;
                default:
                    break;
            }
            $model->save();
        } else {
            $model = new GacApprovalStatus();
            $model->FiscalYear = $fiscalYear;
            $model->EntityCode = $entityCode;
            $model->ApprovedFlag = 1;
            $model->save();
        }
    }

}
