<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gac_note_itemranges_u".
 *
 * @property integer $ID
 * @property string $ItemCode
 * @property string $ViewableMask
 * @property string $NonViewableMask
 * @property string $NoteNo
 * @property string $ItemStart
 * @property string $ItemEnd
 * @property integer $ActiveFlag
 * @property string $DateCreated
 * @property integer $UserCreated
 * @property string $DateModified
 * @property integer $UserModified
 */
class GacNoteItemrangesU extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'gac_note_itemranges_u';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['NoteNo', 'ItemStart', 'ItemEnd'], 'required'],
            [['ItemCode', 'ViewableMask', 'NonViewableMask', 'NoteNo', 'ItemStart', 'ItemEnd'], 'string'],
            [['ActiveFlag', 'UserCreated', 'UserModified'], 'integer'],
            [['DateCreated', 'DateModified'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'ID' => 'ID',
            'ItemCode' => 'Item Code',
            'ViewableMask' => 'Viewable Mask',
            'NonViewableMask' => 'Non Viewable Mask',
            'NoteNo' => 'Note No',
            'ItemStart' => 'Item Start',
            'ItemEnd' => 'Item End',
            'ActiveFlag' => 'Active Flag',
            'DateCreated' => 'Date Created',
            'UserCreated' => 'User Created',
            'DateModified' => 'Date Modified',
            'UserModified' => 'User Modified',
        ];
    }

}
