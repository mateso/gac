<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GacGfsChapterU;

/**
 * GacGfsChapterUSearch represents the model behind the search form about `app\models\GacGfsChapterU`.
 */
class GacGfsChapterUSearch extends GacGfsChapterU
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ChapterCode', 'ClassificationFlag'], 'integer'],
            [['ChapterDescription', 'Standard'], 'safe'],
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
        $query = GacGfsChapterU::find();

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
            'ChapterCode' => $this->ChapterCode,
            'ClassificationFlag' => $this->ClassificationFlag,
        ]);

        $query->andFilterWhere(['like', 'ChapterDescription', $this->ChapterDescription])
            ->andFilterWhere(['like', 'Standard', $this->Standard]);

        return $dataProvider;
    }
}
