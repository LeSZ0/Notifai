<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id_usuario
 * @property string $usuario
 * @property string $clave
 * @property integer $id_rol
 * @property string $mail
 * @property string $nombre
 * @property string $apellido
 *
 * @property Aviso[] $avisos
 * @property Aviso[] $avisos0
 * @property Comentario[] $comentarios
 * @property InscripcionEvento[] $inscripcionEventos
 * @property Noticia[] $noticias
 * @property Rol $idRol
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario', 'clave', 'id_rol', 'mail', 'nombre', 'apellido'], 'required'],
            [['id_rol'], 'integer'],
            [['usuario', 'mail', 'nombre', 'apellido'], 'string', 'max' => 255],
            [['clave'], 'string', 'max' => 32],
            [['id_rol'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['id_rol' => 'id_rol']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => Yii::t('app', 'Id Usuario'),
            'usuario' => Yii::t('app', 'Usuario'),
            'clave' => Yii::t('app', 'Clave'),
            'id_rol' => Yii::t('app', 'Id Rol'),
            'mail' => Yii::t('app', 'Mail'),
            'nombre' => Yii::t('app', 'Nombre'),
            'apellido' => Yii::t('app', 'Apellido'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvisos()
    {
        return $this->hasMany(Aviso::className(), ['creado_por_id' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvisos0()
    {
        return $this->hasMany(Aviso::className(), ['modificado_por_id' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentario::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcionEventos()
    {
        return $this->hasMany(InscripcionEvento::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoticias()
    {
        return $this->hasMany(Noticia::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRol()
    {
        return $this->hasOne(Rol::className(), ['id_rol' => 'id_rol']);
    }
}
