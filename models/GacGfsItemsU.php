<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gac_gfs_items_u".
 *
 * @property integer $ID
 * @property string $ItemCode
 * @property string $ItemShortDescription
 * @property string $ItemDefinition
 * @property integer $SubChapterCode
 * @property integer $ChapterCode
 */
class GacGfsItemsU extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'gac_gfs_items_u';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ItemCode', 'ItemShortDescription', 'ItemDefinition'], 'string'],
            [['SubChapterCode', 'ChapterCode'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'ID' => 'ID',
            'ItemCode' => 'Item Code',
            'ItemShortDescription' => 'Item Short Description',
            'ItemDefinition' => 'Item Definition',
            'SubChapterCode' => 'Sub Chapter Code',
            'ChapterCode' => 'Chapter Code',
        ];
    }

    public static function getItemDefinitionByGfsItemId($id) {
        $model = self::findOne($id);
        if ($model) {
            return $model->ItemDefinition;
        } else {
            return 'No definition provided';
        }
    }

    public static function getItemCodeByGfsItemId($id) {
        $model = self::findOne($id);
        return $model->ItemCode;
    }
    
    public static function getItemDescByItemCode($id, $subChapterCode, $chapterCode) {
        $model = self::findOne(['ItemCode' => $id, 'SubChapterCode' => $subChapterCode, 'ChapterCode' => $chapterCode]);
        return $model->ItemShortDescription;
    }

}
