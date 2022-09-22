<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_sucursal".
 *
 * @property int $suc_id Id
 * @property string|null $suc_nombre Nombre
 * @property string|null $suc_direccion Dirección
 * @property int|null $suc_telefono Teléfono
 * @property string|null $suc_entrada Entrada
 * @property string|null $suc_salida Salida
 *
 * @property CatPublicidad[] $catPublicidads
 * @property SeServicio[] $seServicios
 */
class CatSucursal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_sucursal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['suc_direccion'], 'string'],
            [['suc_telefono'], 'integer'],
            [['suc_entrada', 'suc_salida'], 'safe'],
            [['suc_nombre'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'suc_id' => Yii::t('app', 'Id'),
            'suc_nombre' => Yii::t('app', 'Nombre'),
            'suc_direccion' => Yii::t('app', 'Dirección'),
            'suc_telefono' => Yii::t('app', 'Teléfono'),
            'suc_entrada' => Yii::t('app', 'Entrada'),
            'suc_salida' => Yii::t('app', 'Salida'),
        ];
    }

    /**
     * Gets query for [[CatPublicidads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatPublicidads()
    {
        return $this->hasMany(CatPublicidad::className(), ['pub_fksucursal' => 'suc_id']);
    }

    /**
     * Gets query for [[SeServicios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeServicios()
    {
        return $this->hasMany(SeServicio::className(), ['ser_fksucursal' => 'suc_id']);
    }
}
