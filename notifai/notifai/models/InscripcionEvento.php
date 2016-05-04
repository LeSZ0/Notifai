<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inscripcion_evento".
 *
 * @property integer $id_inscripcion
 * @property integer $id_usuario
 * @property integer $id_evento
 * @property string $fecha_inicio
 * @property string $fecha_fin
 *
 * @property Usuario $idUsuario
 * @property Evento $idEvento
 */
class InscripcionEvento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inscripcion_evento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_evento'], 'required'],
            [['id_usuario', 'id_evento'], 'integer'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
            [['id_evento'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['id_evento' => 'id_evento']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_inscripcion' => Yii::t('app', 'Id Inscripcion'),
            'id_usuario' => Yii::t('app', 'Id Usuario'),
            'id_evento' => Yii::t('app', 'Id Evento'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEvento()
    {
        return $this->hasOne(Evento::className(), ['id_evento' => 'id_evento']);
    }
}
