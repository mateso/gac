<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GacGfsListU;

/**
 * GacGfsListUSearch represents the model behind the search form about `app\models\GacGfsListU`.
 */
class GacGfsListUSearch extends GacGfsListU
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'Chapter', 'ActiveFlag', 'UserCreated', 'UserModified'], 'integer'],
            [['SubChapter', 'Item', 'SubItem', 'ItemDescription', 'GFSTransaction', 'GFSHoldingGain', 'GFSVolume', 'GFSStock', 'DateCreated', 'DateModified'], 'safe'],
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
        $query = GacGfsListU::find()->where(['ActiveFlag' => 1])->orderBy(['ID' => SORT_DESC]);

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
            'Chapter' => $this->Chapter,
            'ActiveFlag' => $this->ActiveFlag,
            'DateCreated' => $this->DateCreated,
            'UserCreated' => $this->UserCreated,
            'DateModified' => $this->DateModified,
            'UserModified' => $this->UserModified,
        ]);

        $query->andFilterWhere(['like', 'SubChapter', $this->SubChapter])
            ->andFilterWhere(['like', 'Item', $this->Item])
            ->andFilterWhere(['like', 'SubItem', $this->SubItem])
            ->andFilterWhere(['like', 'ItemDescription', $this->ItemDescription])
            ->andFilterWhere(['like', 'GFSTransaction', $this->GFSTransaction])
            ->andFilterWhere(['like', 'GFSHoldingGain', $this->GFSHoldingGain])
            ->andFilterWhere(['like', 'GFSVolume', $this->GFSVolume])
            ->andFilterWhere(['like', 'GFSStock', $this->GFSStock]);

        return $dataProvider;
    }
}
