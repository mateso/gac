<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GacGfsItemsU;

/**
 * GacGfsItemsUSearch represents the model behind the search form about `app\models\GacGfsItemsU`.
 */
class GacGfsItemsUSearch extends GacGfsItemsU
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'SubChapterCode', 'ChapterCode'], 'integer'],
            [['ItemCode', 'ItemShortDescription', 'ItemDefinition'], 'safe'],
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
        $query = GacGfsItemsU::find();

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
            'SubChapterCode' => $this->SubChapterCode,
            'ChapterCode' => $this->ChapterCode,
        ]);

        $query->andFilterWhere(['like', 'ItemCode', $this->ItemCode])
            ->andFilterWhere(['like', 'ItemShortDescription', $this->ItemShortDescription])
            ->andFilterWhere(['like', 'ItemDefinition', $this->ItemDefinition]);

        return $dataProvider;
    }
}
