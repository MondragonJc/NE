<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_red".
 *
 * @property int $red_id Id
 * @property int $red_fkempleado Empleado
 * @property int $red_fkplataforma Plataforma
 *
 * @property SeEmpleado $redFkempleado
 * @property CatPlataforma $redFkplataforma
 */
class CatRed extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_red';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['red_fkempleado', 'red_fkplataforma'], 'required'],
            [['red_fkempleado', 'red_fkplataforma'], 'integer'],
            [['red_fkempleado'], 'exist', 'skipOnError' => true, 'targetClass' => SeEmpleado::className(), 'targetAttribute' => ['red_fkempleado' => 'emp_id']],
            [['red_fkplataforma'], 'exist', 'skipOnError' => true, 'targetClass' => CatPlataforma::className(), 'targetAttribute' => ['red_fkplataforma' => 'pla_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'red_id' => Yii::t('app', 'Id'),
            'red_fkempleado' => Yii::t('app', 'Empleado'),
            'red_fkplataforma' => Yii::t('app', 'Plataforma'),
        ];
    }

    /**
     * Gets query for [[RedFkempleado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRedFkempleado()
    {
        return $this->hasOne(SeEmpleado::className(), ['emp_id' => 'red_fkempleado']);
    }

    /**
     * Gets query for [[RedFkplataforma]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRedFkplataforma()
    {
        return $this->hasOne(CatPlataforma::className(), ['pla_id' => 'red_fkplataforma']);
    }
}
