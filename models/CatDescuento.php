<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_descuento".
 *
 * @property int $des_id id
 * @property string $des_nombre Nombre
 * @property string $des_inicio Inicio
 * @property string $des_fin Fin
 * @property float $des_porcetanje Porcentaje del descuento
 * @property string $des_estatus Estatus
 *
 * @property Serviciodescuento[] $serviciodescuentos
 */
class CatDescuento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_descuento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['des_nombre', 'des_inicio', 'des_fin', 'des_porcetanje', 'des_estatus'], 'required'],
            [['des_inicio', 'des_fin'], 'safe'],
            [['des_porcetanje'], 'number'],
            [['des_estatus'], 'string'],
            [['des_nombre'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'des_id' => Yii::t('app', 'id'),
            'des_nombre' => Yii::t('app', 'Nombre'),
            'des_inicio' => Yii::t('app', 'Inicio'),
            'des_fin' => Yii::t('app', 'Fin'),
            'des_porcetanje' => Yii::t('app', 'Porcentaje del descuento'),
            'des_estatus' => Yii::t('app', 'Estatus'),
        ];
    }

    /**
     * Gets query for [[Serviciodescuentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServiciodescuentos()
    {
        return $this->hasMany(Serviciodescuento::className(), ['serdes_fkcat_descuento' => 'des_id']);
    }
}
