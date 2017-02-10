<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GacDataStatisticSummaryV;

/**
 * GacDataStatisticSummaryVSearch represents the model behind the search form about `app\models\GacDataStatisticSummaryV`.
 */
class GacDataStatisticSummaryVSearch extends GacDataStatisticSummaryV
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['Total_Entity', 'Entity_Entered', 'Entity_Approved', 'Entity_Balance', 'Entity_Posted'], 'integer'],
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
        $query = GacDataStatisticSummaryV::find();

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
            'Total_Entity' => $this->Total_Entity,
            'Entity_Entered' => $this->Entity_Entered,
            'Entity_Approved' => $this->Entity_Approved,
            'Entity_Balance' => $this->Entity_Balance,
            'Entity_Posted' => $this->Entity_Posted,
        ]);

        return $dataProvider;
    }
}
