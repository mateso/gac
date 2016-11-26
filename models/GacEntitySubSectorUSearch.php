<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GacEntitySubSectorU;

/**
 * GacEntitySubSectorUSearch represents the model behind the search form about `app\models\GacEntitySubSectorU`.
 */
class GacEntitySubSectorUSearch extends GacEntitySubSectorU
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SubSectorID', 'SectorID'], 'integer'],
            [['SubSectorDescription'], 'safe'],
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
        $query = GacEntitySubSectorU::find();

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
            'SubSectorID' => $this->SubSectorID,
            'SectorID' => $this->SectorID,
        ]);

        $query->andFilterWhere(['like', 'SubSectorDescription', $this->SubSectorDescription]);

        return $dataProvider;
    }
}
