<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comentario".
 *
 * @property integer $id_comentario
 * @property integer $id_noticia
 * @property integer $id_usuario
 * @property integer $comentario_original
 * @property string $contenido
 * @property string $fecha
 * @property integer $megusta
 *
 * @property Noticia $idNoticia
 * @property Usuario $idUsuario
 */
class Comentario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comentario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_noticia', 'id_usuario', 'comentario_original', 'contenido', 'fecha', 'megusta'], 'required'],
            [['id_noticia', 'id_usuario', 'comentario_original', 'megusta'], 'integer'],
            [['fecha'], 'safe'],
            [['contenido'], 'string', 'max' => 100],
            [['id_noticia'], 'exist', 'skipOnError' => true, 'targetClass' => Noticia::className(), 'targetAttribute' => ['id_noticia' => 'id_noticia']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_comentario' => Yii::t('app', 'Id Comentario'),
            'id_noticia' => Yii::t('app', 'Id Noticia'),
            'id_usuario' => Yii::t('app', 'Id Usuario'),
            'comentario_original' => Yii::t('app', 'Comentario Original'),
            'contenido' => Yii::t('app', 'Contenido'),
            'fecha' => Yii::t('app', 'Fecha'),
            'megusta' => Yii::t('app', 'Megusta'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNoticia()
    {
        return $this->hasOne(Noticia::className(), ['id_noticia' => 'id_noticia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id_usuario' => 'id_usuario']);
    }
}
