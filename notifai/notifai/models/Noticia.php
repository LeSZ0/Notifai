<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "noticia".
 *
 * @property integer $id_noticia
 * @property integer $id_seccion
 * @property string $titulo
 * @property string $fecha
 * @property string $copete
 * @property string $contenido
 * @property integer $id_usuario
 *
 * @property Comentario[] $comentarios
 * @property Seccion $idSeccion
 * @property Usuario $idUsuario
 */
class Noticia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'noticia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_seccion', 'titulo', 'fecha', 'copete', 'contenido', 'id_usuario'], 'required'],
            [['id_seccion', 'id_usuario'], 'integer'],
            [['fecha'], 'safe'],
            [['contenido'], 'string'],
            [['titulo'], 'string', 'max' => 255],
            [['copete'], 'string', 'max' => 1000],
            [['id_seccion'], 'exist', 'skipOnError' => true, 'targetClass' => Seccion::className(), 'targetAttribute' => ['id_seccion' => 'id_seccion']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_noticia' => Yii::t('app', 'Id Noticia'),
            'id_seccion' => Yii::t('app', 'Id Seccion'),
            'titulo' => Yii::t('app', 'Titulo'),
            'fecha' => Yii::t('app', 'Fecha'),
            'copete' => Yii::t('app', 'Copete'),
            'contenido' => Yii::t('app', 'Contenido'),
            'id_usuario' => Yii::t('app', 'Id Usuario'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentario::className(), ['id_noticia' => 'id_noticia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSeccion()
    {
        return $this->hasOne(Seccion::className(), ['id_seccion' => 'id_seccion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id_usuario' => 'id_usuario']);
    }
}
