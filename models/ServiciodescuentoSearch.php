<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Serviciodescuento;

/**
 * ServiciodescuentoSearch represents the model behind the search form of `app\models\Serviciodescuento`.
 */
class ServiciodescuentoSearch extends Serviciodescuento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['serdes_id', 'serdes_fkcat_descuento', 'serdes_fkcitaservicio'], 'integer'],
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
        $query = Serviciodescuento::find();

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
            'serdes_id' => $this->serdes_id,
            'serdes_fkcat_descuento' => $this->serdes_fkcat_descuento,
            'serdes_fkcitaservicio' => $this->serdes_fkcitaservicio,
        ]);

        return $dataProvider;
    }
}
