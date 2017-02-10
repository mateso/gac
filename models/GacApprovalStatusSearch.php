<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GacApprovalStatus;

/**
 * GacApprovalStatusSearch represents the model behind the search form about `app\models\GacApprovalStatus`.
 */
class GacApprovalStatusSearch extends GacApprovalStatus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ApprovalStatusId', 'ApprovedFlag', 'PostedFlag'], 'integer'],
            [['EntityCode', 'FiscalYear'], 'safe'],
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
        $query = GacApprovalStatus::find();

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
            'ApprovalStatusId' => $this->ApprovalStatusId,
            'ApprovedFlag' => $this->ApprovedFlag,
            'PostedFlag' => $this->PostedFlag,
        ]);

        $query->andFilterWhere(['like', 'EntityCode', $this->EntityCode])
            ->andFilterWhere(['like', 'FiscalYear', $this->FiscalYear]);

        return $dataProvider;
    }
}
