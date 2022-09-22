<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatSucursal;

/**
 * CatSucursalSearch represents the model behind the search form of `app\models\CatSucursal`.
 */
class CatSucursalSearch extends CatSucursal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['suc_id', 'suc_telefono'], 'integer'],
            [['suc_nombre', 'suc_direccion', 'suc_entrada', 'suc_salida'], 'safe'],
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
        $query = CatSucursal::find();

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
            'suc_id' => $this->suc_id,
            'suc_telefono' => $this->suc_telefono,
            'suc_entrada' => $this->suc_entrada,
            'suc_salida' => $this->suc_salida,
        ]);

        $query->andFilterWhere(['like', 'suc_nombre', $this->suc_nombre])
            ->andFilterWhere(['like', 'suc_direccion', $this->suc_direccion]);

        return $dataProvider;
    }
}
