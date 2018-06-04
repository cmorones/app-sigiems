<?php

namespace app\modules\consumibles\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\consumibles\models\Consumibles;

/**
 * ConsumiblesSearch represents the model behind the search form about `app\modules\consumibles\models\Consumibles`.
 */
class ConsumiblesSearch extends Consumibles
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_medida',  'existencia_min', 'id_area','existencia_max','status', 'created_by', 'updated_by', 'id_area'], 'integer'],
            [['nombre', 'detalle', 'imagen', 'created_at', 'updated_at'], 'safe'],
            [['precio'], 'number'],
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
        $query = Consumibles::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'pagination'=> ['pageSize'=>100],
     
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
            'id_medida' => $this->id_medida,
            'precio' => $this->precio,
            'status' => $this->status,
            'existencia_min' => $this->existencia_min,
            'existencia_max' => $this->existencia_max,
            'id_area' => $this->id_area,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'id_area' => $perfil,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'detalle', $this->detalle])
            ->andFilterWhere(['like', 'imagen', $this->imagen]);

        return $dataProvider;
    }
}
