<?php

namespace app\modules\consumibles\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\consumibles\models\ConsDetalle;

/**
 * ConsDetalleSearch represents the model behind the search form about `app\modules\consumibles\models\ConsDetalle`.
 */
class ConsDetalleSearch extends ConsDetalle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_salida', 'id_cons', 'cantidad', 'estado', 'created_by', 'updated_by'], 'integer'],
            [['descripcion', 'created_at', 'updated_at'], 'safe'],
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
        $query = ConsDetalle::find();

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
            'id_salida' => $this->id_salida,
            'id_cons' => $this->id_cons,
            'cantidad' => $this->cantidad,
            'estado' => $this->estado,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
