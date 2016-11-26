<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GacDataTrxdetU;

/**
 * GacDataTrxdetUSearch represents the model behind the search form about `app\models\GacDataTrxdetU`.
 */
class GacDataTrxdetUSearch extends GacDataTrxdetU {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ID', 'ClassificationCode', 'FiscalYear', 'EntryUser', 'ApprovedFlag', 'ApprovalUser', 'PostedFlag', 'ClosedFlag'], 'integer'],
            [['TransCtrlNum', 'EntityCode', 'BookID', 'GFSCode', 'GFSCodeDesc', 'NoteNo', 'EntryDate', 'ApprovedDate'], 'safe'],
            [['ApprovedBudget', 'Reallocation', 'Actual'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params, $condition = NULL) {
//        $query = GacDataTrxdetU::find()->orderBy(['ID' => SORT_DESC]);
        $query = GacDataTrxdetU::find()->joinWith('gacGfsListV')->orderBy(['gac_data_trxdet_u.ID' => SORT_DESC]);

        // add conditions that should always apply here
        if ($condition != NULL) {
            $query->andWhere($condition);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10
            ],
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
            'ClassificationCode' => $this->ClassificationCode,
            'FiscalYear' => $this->FiscalYear,
            'ApprovedBudget' => $this->ApprovedBudget,
            'Reallocation' => $this->Reallocation,
            'Actual' => $this->Actual,
            'EntryDate' => $this->EntryDate,
            'EntryUser' => $this->EntryUser,
            'ApprovedFlag' => $this->ApprovedFlag,
            'ApprovedDate' => $this->ApprovedDate,
            'ApprovalUser' => $this->ApprovalUser,
            'PostedFlag' => $this->PostedFlag,
            'ClosedFlag' => $this->ClosedFlag,
        ]);

        $query->andFilterWhere(['like', 'TransCtrlNum', $this->TransCtrlNum])
                ->andFilterWhere(['like', 'EntityCode', $this->EntityCode])
                ->andFilterWhere(['like', 'BookID', $this->BookID])
                ->andFilterWhere(['like', 'GFSCode', $this->GFSCode])
                ->andFilterWhere(['like', 'gac_gfs_list_v.ItemDescription', $this->GFSCodeDesc])
                ->andFilterWhere(['like', 'NoteNo', $this->NoteNo]);

        return $dataProvider;
    }

}
