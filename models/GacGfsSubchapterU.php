<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gac_gfs_subchapter_u".
 *
 * @property integer $ID
 * @property string $SubChapterCode
 * @property string $SubChapterDescription
 * @property integer $ChapterCode
 */
class GacGfsSubchapterU extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'gac_gfs_subchapter_u';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['SubChapterCode', 'SubChapterDescription'], 'string'],
            [['ChapterCode'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'ID' => 'ID',
            'SubChapterCode' => 'Sub Chapter Code',
            'SubChapterDescription' => 'Sub Chapter Description',
            'ChapterCode' => 'Chapter Code',
        ];
    }

    public static function getChapterCodeBySubChapterId($id) {
        $model = self::findOne($id);
        return $model->ChapterCode;
    }

    public static function getSubChapterCodeBySubChapterId($id) {
        $model = self::findOne($id);
        return $model->SubChapterCode;
    }

    public static function getSubChapterDefinitionBySubChapterId($id) {
        $model = self::findOne($id);
        if ($model) {
            return $model->SubChapterDefinition;
        } else {
            return 'No definition provided';
        }
    }

    public static function getSubChapterDescBySubChapterCode($id, $chapterCode) {
        $model = self::findOne(['SubChapterCode' => $id, 'ChapterCode' => $chapterCode]);
        return $model->SubChapterDescription;
    }

}
