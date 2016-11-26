<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gac_gfs_chapter_u".
 *
 * @property integer $ChapterCode
 * @property string $ChapterDescription
 * @property integer $ClassificationFlag
 * @property string $Standard
 */
class GacGfsChapterU extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gac_gfs_chapter_u';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ChapterCode'], 'required'],
            [['ChapterCode', 'ClassificationFlag'], 'integer'],
            [['ChapterDescription', 'Standard'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ChapterCode' => 'Chapter Code',
            'ChapterDescription' => 'Chapter Description',
            'ClassificationFlag' => 'Classification Flag',
            'Standard' => 'Standard',
        ];
    }
    
    public static function getChapterDescByChapterCode($id){
        $model = self::findOne($id);
        return $model->ChapterDescription;
    }
}
