<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rol".
 *
 * @property integer $id_rol
 * @property string $descripcion
 *
 * @property Usuario[] $usuarios
 */
class Rol extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rol', 'descripcion'], 'required'],
            [['id_rol'], 'integer'],
            [['descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_rol' => Yii::t('app', 'Id Rol'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['id_rol' => 'id_rol']);
    }
}
