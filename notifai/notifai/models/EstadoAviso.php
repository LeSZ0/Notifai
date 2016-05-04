<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_aviso".
 *
 * @property integer $id_estado_aviso
 * @property string $nombre
 * @property string $descripcion
 *
 * @property Aviso[] $avisos
 */
class EstadoAviso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_aviso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_estado_aviso'], 'required'],
            [['id_estado_aviso'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estado_aviso' => Yii::t('app', 'Id Estado Aviso'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvisos()
    {
        return $this->hasMany(Aviso::className(), ['estado_id' => 'id_estado_aviso']);
    }
}
