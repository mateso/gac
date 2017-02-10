<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ModalReportParameters extends Model {

    public $fiscal_year;
    public $vote_code;
    public $entity_sector;
    public $entity_sub_sector;
    public $entity_list;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['fiscal_year'], 'required'],
            [['fiscal_year', 'vote_code', 'entity_sub_sector', 'entity_list'], 'safe'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'fiscal_year' => 'Fiscal Year',
            'vote_code' => 'Vote Code',
            'entity_sub_sector' => 'Sub Sector',
            'entity_list' => 'Entity List',
        ];
    }

}
