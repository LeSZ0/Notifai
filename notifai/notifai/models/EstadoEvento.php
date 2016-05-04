<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_evento".
 *
 * @property integer $id_estado
 * @property string $descripcion
 *
 * @property Evento[] $eventos
 */
class EstadoEvento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_evento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estado' => Yii::t('app', 'ID'),
            'descripcion' => Yii::t('app', 'Descripción'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventos()
    {
        return $this->hasMany(Evento::className(), ['id_estado' => 'id_estado']);
    }
}
