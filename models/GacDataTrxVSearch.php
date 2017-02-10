<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GacDataTrxV;

/**
 * GacDataTrxVSearch represents the model behind the search form about `app\models\GacDataTrxV`.
 */
class GacDataTrxVSearch extends GacDataTrxV
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FiscalYear', 'NumTransaction', 'ApprovedFlag', 'PostedFlag', 'ClosedFlag'], 'integer'],
            [['InstitutionalCode', 'EntityCode', 'EntityDescription', 'ApprovedDate', 'DatePosted', 'ActualDr', 'ActualCr'], 'safe'],
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
        $query = GacDataTrxV::find();

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
            'FiscalYear' => $this->FiscalYear,
            'NumTransaction' => $this->NumTransaction,
            'ApprovedFlag' => $this->ApprovedFlag,
            'ApprovedDate' => $this->ApprovedDate,
            'PostedFlag' => $this->PostedFlag,
            'DatePosted' => $this->DatePosted,
            'ClosedFlag' => $this->ClosedFlag,
        ]);

        $query->andFilterWhere(['like', 'InstitutionalCode', $this->InstitutionalCode])
            ->andFilterWhere(['like', 'EntityCode', $this->EntityCode])
            ->andFilterWhere(['like', 'EntityDescription', $this->EntityDescription]);

        return $dataProvider;
    }
}
