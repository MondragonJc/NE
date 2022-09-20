<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "citaservicio".
 *
 * @property int $citser_id Id
 * @property int|null $citser_valoracion Valoración
 * @property string|null $citser_comentario Comentario
 * @property int $citser_fkcita Cita
 * @property int $citser_fkservicio Servicio
 *
 * @property CatCita $citserFkcita
 * @property SeServicio $citserFkservicio
 * @property Serviciodescuento[] $serviciodescuentos
 */
class Citaservicio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'citaservicio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['citser_valoracion', 'citser_fkcita', 'citser_fkservicio'], 'integer'],
            [['citser_fkcita', 'citser_fkservicio'], 'required'],
            [['citser_comentario'], 'string', 'max' => 150],
            [['citser_fkcita'], 'exist', 'skipOnError' => true, 'targetClass' => CatCita::className(), 'targetAttribute' => ['citser_fkcita' => 'cit_id']],
            [['citser_fkservicio'], 'exist', 'skipOnError' => true, 'targetClass' => SeServicio::className(), 'targetAttribute' => ['citser_fkservicio' => 'ser_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'citser_id' => Yii::t('app', 'Id'),
            'citser_valoracion' => Yii::t('app', 'Valoración'),
            'citser_comentario' => Yii::t('app', 'Comentario'),
            'citser_fkcita' => Yii::t('app', 'Cita'),
            'citser_fkservicio' => Yii::t('app', 'Servicio'),
        ];
    }

    /**
     * Gets query for [[CitserFkcita]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCitserFkcita()
    {
        return $this->hasOne(CatCita::className(), ['cit_id' => 'citser_fkcita']);
    }

    /**
     * Gets query for [[CitserFkservicio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCitserFkservicio()
    {
        return $this->hasOne(SeServicio::className(), ['ser_id' => 'citser_fkservicio']);
    }

    /**
     * Gets query for [[Serviciodescuentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServiciodescuentos()
    {
        return $this->hasMany(Serviciodescuento::className(), ['serdes_fkcitaservicio' => 'citser_id']);
    }
}
