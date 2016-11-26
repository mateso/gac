<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gac_gfs_list_u".
 *
 * @property integer $ID
 * @property integer $Chapter
 * @property string $SubChapter
 * @property string $Item
 * @property string $SubItem
 * @property string $ItemDescription
 * @property string $GFSTransaction
 * @property string $GFSHoldingGain
 * @property string $GFSVolume
 * @property string $GFSStock
 * @property integer $ActiveFlag
 * @property string $DateCreated
 * @property integer $UserCreated
 * @property string $DateModified
 * @property integer $UserModified
 */
class GacGfsListU extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'gac_gfs_list_u';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['Chapter', 'ActiveFlag', 'UserCreated', 'UserModified'], 'integer'],
            [['SubChapter', 'Item', 'SubItem', 'ItemDescription', 'GFSTransaction', 'GFSHoldingGain', 'GFSVolume', 'GFSStock'], 'string'],
            [['DateCreated', 'DateModified'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'ID' => 'ID',
            'Chapter' => 'Chapter',
            'SubChapter' => 'Sub Chapter',
            'Item' => 'Item',
            'SubItem' => 'Sub Item',
            'ItemDescription' => 'Item Description',
            'GFSTransaction' => 'Gfstransaction',
            'GFSHoldingGain' => 'Gfsholding Gain',
            'GFSVolume' => 'Gfsvolume',
            'GFSStock' => 'Gfsstock',
            'ActiveFlag' => 'Active Flag',
            'DateCreated' => 'Date Created',
            'UserCreated' => 'User Created',
            'DateModified' => 'Date Modified',
            'UserModified' => 'User Modified',
        ];
    }
}
