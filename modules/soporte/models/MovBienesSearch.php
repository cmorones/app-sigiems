<?php

namespace app\modules\soporte\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\soporte\models\MovBienes;

/**
 * MovBienesSearch represents the model behind the search form about `app\modules\soporte\models\MovBienes`.
 */
class MovBienesSearch extends MovBienes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_plantel', 'folio', 'area_origen', 'area_destino', 'suministro', 'prestamo', 'salida', 'equipo', 'refaccion', 'material', 'tipo_manto', 'actualizacion', 'distribucion', 'garantia', 'estado', 'created_by', 'updated_by','plantel'], 'integer'],
            [['fecha', 'condiciones', 'observaciones', 'autoriza', 'entrega', 'recibe', 'created_at', 'updated_at'], 'safe'],
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
        $query = MovBienes::find();

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
            'id' => $this->id,
            'id_plantel' => $this->id_plantel,
            'folio' => $this->folio,
            'fecha' => $this->fecha,
            'area_origen' => $this->area_origen,
            'area_destino' => $this->area_destino,
            'plantel' => $this->plantel,
            'suministro' => $this->suministro,
            'prestamo' => $this->prestamo,
            'salida' => $this->salida,
            'equipo' => $this->equipo,
            'refaccion' => $this->refaccion,
            'material' => $this->material,
            'tipo_manto' => $this->tipo_manto,
            'actualizacion' => $this->actualizacion,
            'distribucion' => $this->distribucion,
            'garantia' => $this->garantia,
            'estado' => $this->estado,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'condiciones', $this->condiciones])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'autoriza', $this->autoriza])
            ->andFilterWhere(['like', 'entrega', $this->entrega])
            ->andFilterWhere(['like', 'recibe', $this->recibe]);

        return $dataProvider;
    }
}
