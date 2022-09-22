<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_categoria".
 *
 * @property int $cat_id Id
 * @property string $cat_nombre Nombre
 * @property int $cat_costo Costo
 * @property string $cat_duracion Duración
 * @property string $cat_imagen Profesión
 * @property int $cat_fkprofesion Imagen
 *
 * @property CatProfesion $catProfesion
 * @property SeEmpleado[] $pros
 * @property SeServicio[] $seServicios
 */
class CatCategoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_nombre', 'cat_costo', 'cat_duracion', 'cat_imagen', 'cat_fkprofesion'], 'required'],
            [['cat_costo', 'cat_fkprofesion'], 'integer'],
            [['cat_duracion'], 'safe'],
            [['cat_nombre'], 'string', 'max' => 15],
            [['cat_imagen'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cat_id' => Yii::t('app', 'Id'),
            'cat_nombre' => Yii::t('app', 'Nombre'),
            'cat_costo' => Yii::t('app', 'Costo'),
            'cat_duracion' => Yii::t('app', 'Duración'),
            'cat_imagen' => Yii::t('app', 'Profesión'),
            'cat_fkprofesion' => Yii::t('app', 'Imagen'),
        ];
    }

    /**
     * Gets query for [[CatProfesion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatProfesion()
    {
        return $this->hasOne(CatProfesion::className(), ['pro_id' => 'cat_fkprofesion']);
    }

    /**
     * Gets query for [[Pros]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPros()
    {
        return $this->hasMany(SeEmpleado::className(), ['emp_fkprofesion' => 'pro_id'])->viaTable('cat_profesion', ['pro_id' => 'cat_fkprofesion']);
    }

    /**
     * Gets query for [[SeServicios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeServicios()
    {
        return $this->hasMany(SeServicio::className(), ['ser_fkcategoria' => 'cat_id']);
    }
}
