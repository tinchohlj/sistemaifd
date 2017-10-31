<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pedidos".
 *
 * @property integer $id
 * @property integer $alumno_id
 * @property integer $cantidad
 * @property string $tipo
 * @property boolean $estado
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pedidos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alumno_id', 'carrera_id','cantidad', 'tipo'], 'required'],
            [['alumno_id', 'carrera_id','cantidad'], 'integer'],
            [['fecha_pedido'], 'safe'],
            [['estado'], 'boolean'],
            [['tipo'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alumno_id' => 'Alumno ID',
            'carrera_id' => 'Carrera ID',
            'cantidad' => 'Cantidad',
            'tipo' => 'Tipo',
            'fecha_pedido' => 'Fecha de pedido',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno()
    {
        return $this->hasOne(Alumno::className(), ['id' => 'alumno_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarrera()
    {
        return $this->hasOne(Carrera::className(), ['id' => 'carrera_id']);
    }
}
