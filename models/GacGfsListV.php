<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gac_gfs_list_v".
 *
 * @property integer $ChapterCode
 * @property string $Standard
 * @property string $ChapterDescription
 * @property string $SubChapterCode
 * @property string $SubChapterDescription
 * @property string $ItemCode
 * @property string $ItemShortDescription
 * @property string $ItemDefinition
 * @property string $SubItem
 * @property string $ItemDescription
 * @property string $GFSMCode
 * @property integer $ClassificationCode
 */
class GacGfsListV extends \yii\db\ActiveRecord {

    public static function primaryKey() {
        return ['GFSMCode'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'gac_gfs_list_v';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ChapterCode', 'ClassificationCode'], 'required'],
            [['ChapterCode', 'ClassificationCode'], 'integer'],
            [['Standard', 'ChapterDescription', 'SubChapterCode', 'SubChapterDescription', 'ItemCode', 'ItemShortDescription', 'ItemDefinition', 'SubItem', 'ItemDescription', 'GFSMCode'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'ChapterCode' => 'Chapter Code',
            'Standard' => 'Standard',
            'ChapterDescription' => 'Chapter Description',
            'SubChapterCode' => 'Sub Chapter Code',
            'SubChapterDescription' => 'Sub Chapter Description',
            'ItemCode' => 'Item Code',
            'ItemShortDescription' => 'Item Short Description',
            'ItemDefinition' => 'Item Definition',
            'SubItem' => 'Sub Item',
            'ItemDescription' => 'Item Description',
            'GFSMCode' => 'Gfsmcode',
            'ClassificationCode' => 'Classification Code',
        ];
    }

    public static function getItemDefinitionByGfsItemCode($id) {
        $model = self::findOne(['ItemCode' => $id]);
        if ($model) {
            return $model->ItemDefinition;
        } else {
            return 'No definition provided';
        }
    }

    public static function getChapterCodebyGfsmCode($id) {
        $model = self::findOne(['GFSMCode' => $id]);
        return $model->ChapterCode;
    }

}
