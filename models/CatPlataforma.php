<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "cat_plataforma".
 *
 * @property int $pla_id Id
 * @property string $pla_nombre Nombre
 *
 * @property CatPublicidad[] $catPublicidads
 * @property CatRed[] $catReds
 */
class CatPlataforma extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_plataforma';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pla_nombre'], 'required'],
            [['pla_nombre'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pla_id' => Yii::t('app', 'Id'),
            'pla_nombre' => Yii::t('app', 'Nombre'),
        ];
    }

    /**
     * Gets query for [[CatPublicidads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatPublicidads()
    {
        return $this->hasMany(CatPublicidad::className(), ['pub_fkplataforma' => 'pla_id']);
    }

    /**
     * Gets query for [[CatReds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatReds()
    {
        return $this->hasMany(CatRed::className(), ['red_fkplataforma' => 'pla_id']);
    }

    public static function  map(){
        return ArrayHelper::map(self::find()->all(), 'pla_id', 'pla_nombre');
    }
}
