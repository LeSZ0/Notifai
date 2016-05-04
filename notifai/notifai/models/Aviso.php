<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aviso".
 *
 * @property integer $id_aviso
 * @property string $nombre
 * @property string $descripcion
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $creado_por_id
 * @property integer $modificado_por_id
 * @property integer $estado_id
 * @property integer $rubro_id
 *
 * @property Usuario $creadoPor
 * @property Usuario $modificadoPor
 * @property EstadoAviso $estado
 * @property Rubro $rubro
 */
class Aviso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aviso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_aviso'], 'required'],
            [['id_aviso', 'creado_por_id', 'modificado_por_id', 'estado_id', 'rubro_id'], 'integer'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['nombre'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 500],
            [['creado_por_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['creado_por_id' => 'id_usuario']],
            [['modificado_por_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['modificado_por_id' => 'id_usuario']],
            [['estado_id'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoAviso::className(), 'targetAttribute' => ['estado_id' => 'id_estado_aviso']],
            [['rubro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rubro::className(), 'targetAttribute' => ['rubro_id' => 'id_rubro']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_aviso' => Yii::t('app', 'Id Aviso'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
            'creado_por_id' => Yii::t('app', 'Creado Por ID'),
            'modificado_por_id' => Yii::t('app', 'Modificado Por ID'),
            'estado_id' => Yii::t('app', 'Estado ID'),
            'rubro_id' => Yii::t('app', 'Rubro ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreadoPor()
    {
        return $this->hasOne(Usuario::className(), ['id_usuario' => 'creado_por_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModificadoPor()
    {
        return $this->hasOne(Usuario::className(), ['id_usuario' => 'modificado_por_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(EstadoAviso::className(), ['id_estado_aviso' => 'estado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRubro()
    {
        return $this->hasOne(Rubro::className(), ['id_rubro' => 'rubro_id']);
    }
}
