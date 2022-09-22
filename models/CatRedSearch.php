<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatRed;

/**
 * CatRedSearch represents the model behind the search form of `app\models\CatRed`.
 */
class CatRedSearch extends CatRed
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['red_id', 'red_fkempleado', 'red_fkplataforma'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = CatRed::find();

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
            'red_id' => $this->red_id,
            'red_fkempleado' => $this->red_fkempleado,
            'red_fkplataforma' => $this->red_fkplataforma,
        ]);

        return $dataProvider;
    }
}
