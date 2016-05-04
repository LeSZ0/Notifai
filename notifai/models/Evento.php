<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evento".
 *
 * @property integer $id_evento
 * @property string $nombre
 * @property string $descripcion
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $id_estado
 *
 * @property EstadoEvento $idEstado
 * @property InscripcionEvento[] $inscripcionEventos
 */
class Evento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'id_estado'], 'required'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['id_estado'], 'integer'],
            [['nombre'], 'string', 'max' => 150],
            [['descripcion'], 'string', 'max' => 1000],
            [['id_estado'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoEvento::className(), 'targetAttribute' => ['id_estado' => 'id_estado']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_evento' => Yii::t('app', 'Id Evento'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripción del evento'),
            'fecha_inicio' => Yii::t('app', 'Fecha y hora de inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha y hora del fin'),
            'id_estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstado()
    {
        return $this->hasOne(EstadoEvento::className(), ['id_estado' => 'id_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcionEventos()
    {
        return $this->hasMany(InscripcionEvento::className(), ['id_evento' => 'id_evento']);
    }
}
