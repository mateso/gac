<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GacEntityListU;

/**
 * GacEntityListUSearch represents the model behind the search form about `app\models\GacEntityListU`.
 */
class GacEntityListUSearch extends GacEntityListU
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'SectorID', 'SubSectorID', 'ActiveFlag', 'UserCreated', 'UserModified'], 'integer'],
            [['InstitutionalCode', 'VoteCode', 'EntityCode', 'EntityDescription', 'TransRelation', 'DateCreated', 'DateModified', 'ContactPerson', 'ContactNumber', 'Region'], 'safe'],
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
        $query = GacEntityListU::find();

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
            'SectorID' => $this->SectorID,
            'SubSectorID' => $this->SubSectorID,
            'ActiveFlag' => $this->ActiveFlag,
            'DateCreated' => $this->DateCreated,
            'UserCreated' => $this->UserCreated,
            'DateModified' => $this->DateModified,
            'UserModified' => $this->UserModified,
        ]);

        $query->andFilterWhere(['like', 'InstitutionalCode', $this->InstitutionalCode])
            ->andFilterWhere(['like', 'VoteCode', $this->VoteCode])
            ->andFilterWhere(['like', 'EntityCode', $this->EntityCode])
            ->andFilterWhere(['like', 'EntityDescription', $this->EntityDescription])
            ->andFilterWhere(['like', 'TransRelation', $this->TransRelation])
            ->andFilterWhere(['like', 'ContactPerson', $this->ContactPerson])
            ->andFilterWhere(['like', 'ContactNumber', $this->ContactNumber])
            ->andFilterWhere(['like', 'Region', $this->Region]);

        return $dataProvider;
    }
}
