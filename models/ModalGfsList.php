<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ModalConsolidationStatus is the model behind the contact form.
 */
class ModalGfsList extends Model 
{
    public $classification_desc;
    public $subchapter_desc;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['classification_desc', 'subchapter_desc'], 'required'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'classification_desc' => 'Classification Description',
            'subchapter_desc' => 'Subchapter Description',
        ];
    }

}
