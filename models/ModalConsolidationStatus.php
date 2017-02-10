<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ModalConsolidationStatus is the model behind the contact form.
 */
class ModalConsolidationStatus extends Model 
{
    public $curr_fiscal_year;
    public $status;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['curr_fiscal_year', 'status'], 'required'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'curr_fiscal_year' => 'Fiscal Year',
            'status' => 'Consolidation Status',
        ];
    }

}
