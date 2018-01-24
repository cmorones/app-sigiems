<?php

namespace app\modules\soporte\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\soporte\models\InvContadores;

/**
 * InvContadoresSearch represents the model behind the search form about `app\modules\soporte\models\InvContadores`.
 */
class InvContadoresSearch extends InvContadores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_plantel', 'id_impresora', 'id_periodo', 'id_mes', 'contador_inicial', 'contador_final', 'porcentaje', 'status_cambio', 'status', 'created_by', 'updated_by'], 'integer'],
            [['documento', 'observaciones', 'created_at', 'updated_at'], 'safe'],
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
        $query = InvContadores::find();

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
            'id_impresora' => $this->id_impresora,
            'id_periodo' => $this->id_periodo,
            'id_mes' => $this->id_mes,
            'contador_inicial' => $this->contador_inicial,
            'contador_final' => $this->contador_final,
            'porcentaje' => $this->porcentaje,
            'status_cambio' => $this->status_cambio,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'documento', $this->documento])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
