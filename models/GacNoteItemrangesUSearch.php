<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GacNoteItemrangesU;

/**
 * GacNoteItemrangesUSearch represents the model behind the search form about `app\models\GacNoteItemrangesU`.
 */
class GacNoteItemrangesUSearch extends GacNoteItemrangesU
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'ActiveFlag', 'UserCreated', 'UserModified'], 'integer'],
            [['ItemCode', 'ViewableMask', 'NonViewableMask', 'NoteNo', 'ItemStart', 'ItemEnd', 'DateCreated', 'DateModified'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = GacNoteItemrangesU::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'ActiveFlag' => $this->ActiveFlag,
            'DateCreated' => $this->DateCreated,
            'UserCreated' => $this->UserCreated,
            'DateModified' => $this->DateModified,
            'UserModified' => $this->UserModified,
        ]);

        $query->andFilterWhere(['like', 'ItemCode', $this->ItemCode])
            ->andFilterWhere(['like', 'ViewableMask', $this->ViewableMask])
            ->andFilterWhere(['like', 'NonViewableMask', $this->NonViewableMask])
            ->andFilterWhere(['like', 'NoteNo', $this->NoteNo])
            ->andFilterWhere(['like', 'ItemStart', $this->ItemStart])
            ->andFilterWhere(['like', 'ItemEnd', $this->ItemEnd]);

        return $dataProvider;
    }
}
