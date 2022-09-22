<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "se_persona".
 *
 * @property int $per_id Id
 * @property string $per_nombre
 * @property string $per_paterno
 * @property string $per_materno
 * @property string $per_telefono
 * @property int $per_fkuser
 *
 * @property CatCliente[] $catClientes
 * @property User $perFkuser
 * @property SeEmpleado[] $seEmpleados
 */
class SePersona extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'se_persona';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['per_nombre', 'per_paterno', 'per_materno', 'per_telefono', 'per_fkuser'], 'required'],
            [['per_fkuser'], 'integer'],
            [['per_nombre', 'per_paterno', 'per_materno', 'per_telefono'], 'string', 'max' => 20],
            [['per_fkuser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['per_fkuser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'per_id' => Yii::t('app', 'Id'),
            'per_nombre' => Yii::t('app', 'Per Nombre'),
            'per_paterno' => Yii::t('app', 'Per Paterno'),
            'per_materno' => Yii::t('app', 'Per Materno'),
            'per_telefono' => Yii::t('app', 'Per Telefono'),
            'per_fkuser' => Yii::t('app', 'Per Fkuser'),
        ];
    }

    /**
     * Gets query for [[CatClientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatClientes()
    {
        return $this->hasMany(CatCliente::className(), ['cli_fkpersona' => 'per_id']);
    }

    /**
     * Gets query for [[PerFkuser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerFkuser()
    {
        return $this->hasOne(User::className(), ['id' => 'per_fkuser']);
    }

    /**
     * Gets query for [[SeEmpleados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeEmpleados()
    {
        return $this->hasMany(SeEmpleado::className(), ['emp_fkpersona' => 'per_id']);
    }
    
    public function getNcompleto()
    {
        return "{$this->per_nombre} {$this->per_paterno} {$this->per_materno}";
    }

    public static function map()
    {
        return ArrayHelper::map(self::find()->all(), 'per_id', 'ncompleto');
    }
    
}
