<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatDescuento;

/**
 * CatDescuentoSearch represents the model behind the search form of `app\models\CatDescuento`.
 */
class CatDescuentoSearch extends CatDescuento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['des_id'], 'integer'],
            [['des_nombre', 'des_inicio', 'des_fin', 'des_estatus'], 'safe'],
            [['des_porcetanje'], 'number'],
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
        $query = CatDescuento::find();

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
            'des_id' => $this->des_id,
            'des_inicio' => $this->des_inicio,
            'des_fin' => $this->des_fin,
            'des_porcetanje' => $this->des_porcetanje,
        ]);

        $query->andFilterWhere(['like', 'des_nombre', $this->des_nombre])
            ->andFilterWhere(['like', 'des_estatus', $this->des_estatus]);

        return $dataProvider;
    }
}
