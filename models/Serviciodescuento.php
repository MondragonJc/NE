<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "serviciodescuento".
 *
 * @property int $serdes_id
 * @property int $serdes_fkcat_descuento
 * @property int $serdes_fkcitaservicio
 *
 * @property CatDescuento $serdesFkcatDescuento
 * @property Citaservicio $serdesFkcitaservicio
 */
class Serviciodescuento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'serviciodescuento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['serdes_fkcat_descuento', 'serdes_fkcitaservicio'], 'required'],
            [['serdes_fkcat_descuento', 'serdes_fkcitaservicio'], 'integer'],
            [['serdes_fkcitaservicio'], 'exist', 'skipOnError' => true, 'targetClass' => Citaservicio::className(), 'targetAttribute' => ['serdes_fkcitaservicio' => 'citser_id']],
            [['serdes_fkcat_descuento'], 'exist', 'skipOnError' => true, 'targetClass' => CatDescuento::className(), 'targetAttribute' => ['serdes_fkcat_descuento' => 'des_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'serdes_id' => Yii::t('app', 'Serdes ID'),
            'serdes_fkcat_descuento' => Yii::t('app', 'Serdes Fkcat Descuento'),
            'serdes_fkcitaservicio' => Yii::t('app', 'Serdes Fkcitaservicio'),
        ];
    }

    /**
     * Gets query for [[SerdesFkcatDescuento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSerdesFkcatDescuento()
    {
        return $this->hasOne(CatDescuento::className(), ['des_id' => 'serdes_fkcat_descuento']);
    }

    /**
     * Gets query for [[SerdesFkcitaservicio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSerdesFkcitaservicio()
    {
        return $this->hasOne(Citaservicio::className(), ['citser_id' => 'serdes_fkcitaservicio']);
    }
}
