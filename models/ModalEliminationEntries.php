<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ModalEliminationEntries extends Model {

    public $report_type;
    public $fiscal_year;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['report_type', 'fiscal_year'], 'required'],            
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'report_type' => 'Report Type',
            'fiscal_year' => 'Fiscal Year',
        ];
    }

}
