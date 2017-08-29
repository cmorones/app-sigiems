<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\InvSistemas;

/**
 * InvSistemasSearch represents the model behind the search form about `app\modules\admin\models\InvSistemas`.
 */
class InvSistemasSearch extends InvSistemas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'clasificacion', 'anio_dev', 'tipo', 'created_by', 'updated_by'], 'integer'],
            [['nombre', 'fundamento', 'objetivo', 'desarrollado', 'created_at', 'updated_at'], 'safe'],
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
        $query = InvSistemas::find();

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
            'clasificacion' => $this->clasificacion,
            'anio_dev' => $this->anio_dev,
            'tipo' => $this->tipo,
            //'ult_act' => $this->ult_act,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'fundamento', $this->fundamento])
            ->andFilterWhere(['like', 'objetivo', $this->objetivo])
            ->andFilterWhere(['like', 'desarrollado', $this->desarrollado]);

        return $dataProvider;
    }
}
