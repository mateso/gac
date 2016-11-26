<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gac_note_items_u".
 *
 * @property integer $ID
 * @property string $ItemCode
 * @property string $SubActivityCode
 * @property string $ItemDescription
 * @property string $NoteNo
 * @property integer $x_factor
 * @property integer $SortOrder
 * @property string $Standard
 * @property string $NoteDefinition
 * @property integer $NoteDisplaFlag
 */
class GacNoteItemsU extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gac_note_items_u';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ItemCode'], 'required'],
            [['ItemCode', 'SubActivityCode', 'ItemDescription', 'NoteNo', 'Standard', 'NoteDefinition'], 'string'],
            [['x_factor', 'SortOrder', 'NoteDisplaFlag'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ItemCode' => 'Item Code',
            'SubActivityCode' => 'Sub Activity Code',
            'ItemDescription' => 'Item Description',
            'NoteNo' => 'Note No',
            'x_factor' => 'X Factor',
            'SortOrder' => 'Sort Order',
            'Standard' => 'Standard',
            'NoteDefinition' => 'Note Definition',
            'NoteDisplaFlag' => 'Note Displa Flag',
        ];
    }
}
