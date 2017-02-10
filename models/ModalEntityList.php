<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ModalConsolidationStatus is the model behind the contact form.
 */
class ModalEntityList extends Model 
{
    public $sub_sector_description;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['sub_sector_description'], 'required'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'sub_sector_description' => 'Sub Sector Description',
        ];
    }

}
