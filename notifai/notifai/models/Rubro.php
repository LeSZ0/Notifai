<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rubro".
 *
 * @property integer $id_rubro
 * @property string $nombre
 * @property string $descripcion
 *
 * @property Aviso[] $avisos
 */
class Rubro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rubro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rubro'], 'required'],
            [['id_rubro'], 'integer'],
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
            'id_rubro' => Yii::t('app', 'Id Rubro'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvisos()
    {
        return $this->hasMany(Aviso::className(), ['rubro_id' => 'id_rubro']);
    }
}
