<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GacGlobPeriodU;

/**
 * GacGlobPeriodUSearch represents the model behind the search form about `app\models\GacGlobPeriodU`.
 */
class GacGlobPeriodUSearch extends GacGlobPeriodU
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'fiscal_year', 'initialized_flag', 'closed_flag'], 'integer'],
            [['period_type', 'period_description', 'period_start_date', 'period_end_date'], 'safe'],
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
        $query = GacGlobPeriodU::find();

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
            'fiscal_year' => $this->fiscal_year,
            'period_start_date' => $this->period_start_date,
            'period_end_date' => $this->period_end_date,
            'initialized_flag' => $this->initialized_flag,
            'closed_flag' => $this->closed_flag,
        ]);

        $query->andFilterWhere(['like', 'period_type', $this->period_type])
            ->andFilterWhere(['like', 'period_description', $this->period_description]);

        return $dataProvider;
    }
}
