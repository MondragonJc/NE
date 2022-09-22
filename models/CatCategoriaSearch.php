<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatCategoria;

/**
 * CatCategoriaSearch represents the model behind the search form of `app\models\CatCategoria`.
 */
class CatCategoriaSearch extends CatCategoria
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_id', 'cat_costo', 'cat_fkprofesion'], 'integer'],
            [['cat_nombre', 'cat_duracion', 'cat_imagen'], 'safe'],
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
        $query = CatCategoria::find();

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
            'cat_id' => $this->cat_id,
            'cat_costo' => $this->cat_costo,
            'cat_duracion' => $this->cat_duracion,
            'cat_fkprofesion' => $this->cat_fkprofesion,
        ]);

        $query->andFilterWhere(['like', 'cat_nombre', $this->cat_nombre])
            ->andFilterWhere(['like', 'cat_imagen', $this->cat_imagen]);

        return $dataProvider;
    }
}
