<?php

namespace app\modules\consumibles\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\consumibles\models\ConsSalidas;

/**
 * ConsSalidasSearch represents the model behind the search form about `app\modules\consumibles\models\ConsSalidas`.
 */
class ConsSalidasSearch extends ConsSalidas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'folio', 'id_plantel_origen', 'id_area_origen', 'id_plantel_destino', 'id_area_destino', 'suministro', 'prestamo', 'salida', 'equipo', 'refaccion', 'material', 'tipo_manto', 'actualizacion', 'distribucion', 'garantia', 'estado', 'created_by', 'updated_by'], 'integer'],
            [['sfolio', 'condiciones', 'fecha_reg', 'observaciones', 'autoriza', 'entrega', 'recibe', 'docto', 'created_at', 'updated_at'], 'safe'],
            [['total'], 'number'],
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
        $query = ConsSalidas::find();

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

        $perfil = Yii::$app->user->identity->perfil;

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'folio' => $this->folio,
            'id_plantel_origen' => $this->id_plantel_origen,
            'id_area_origen' => $perfil,
            'id_plantel_destino' => $this->id_plantel_destino,
            'id_area_destino' => $this->id_area_destino,
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
            'total' => $this->total,
            'fecha_reg' => $this->fecha_reg,
            'estado' => $this->estado,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'sfolio', $this->sfolio])
            ->andFilterWhere(['like', 'condiciones', $this->condiciones])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'autoriza', $this->autoriza])
            ->andFilterWhere(['like', 'entrega', $this->entrega])
            ->andFilterWhere(['like', 'recibe', $this->recibe])
            ->andFilterWhere(['like', 'docto', $this->docto]);

        return $dataProvider;
    }
}
