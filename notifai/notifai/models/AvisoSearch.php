<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Aviso;

/**
 * AvisoSearch represents the model behind the search form about `app\models\Aviso`.
 */
class AvisoSearch extends Aviso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_aviso', 'creado_por_id', 'modificado_por_id', 'estado_id', 'rubro_id'], 'integer'],
            [['nombre', 'descripcion', 'fecha_inicio', 'fecha_fin'], 'safe'],
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
        $query = Aviso::find();

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
            'id_aviso' => $this->id_aviso,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'creado_por_id' => $this->creado_por_id,
            'modificado_por_id' => $this->modificado_por_id,
            'estado_id' => $this->estado_id,
            'rubro_id' => $this->rubro_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
