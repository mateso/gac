<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ModalConsolidationStatus is the model behind the contact form.
 */
class ModalConsolidationActions extends Model 
{
    public $entity_code;
    public $fiscal_year;
    public $action_type;
    public $remarks;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['entity_code', 'fiscal_year', 'action_type', 'remarks'], 'required'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'action_type' => 'Action Type',
            'remarks' => 'Remarks',
        ];
    }

}
