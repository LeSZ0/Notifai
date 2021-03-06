<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InscripcionEvento;

/**
 * InscripcionEventoSearch represents the model behind the search form about `app\models\InscripcionEvento`.
 */
class InscripcionEventoSearch extends InscripcionEvento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_inscripcion', 'id_usuario', 'id_evento'], 'integer'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = InscripcionEvento::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_inscripcion' => $this->id_inscripcion,
            'id_usuario' => $this->id_usuario,
            'id_evento' => $this->id_evento,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
        ]);

        return $dataProvider;
    }
}
