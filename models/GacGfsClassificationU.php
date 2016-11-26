<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gac_gfs_classification_u".
 *
 * @property integer $ClassificationCode
 * @property string $ClassificationDescription
 */
class GacGfsClassificationU extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gac_gfs_classification_u';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ClassificationCode'], 'required'],
            [['ClassificationCode'], 'integer'],
            [['ClassificationDescription'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ClassificationCode' => 'Classification Code',
            'ClassificationDescription' => 'Classification Description',
        ];
    }
}
