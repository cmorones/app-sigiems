<?php

namespace app\modules\soporte\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\soporte\models\InvAsignaciones;

/**
 * SearchInvAsignaciones represents the model behind the search form about `app\modules\soporte\models\InvAsignaciones`.
 */
class InvAsignacionesSearch extends InvAsignaciones
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_periodo', 'id_mes', 'id_plantel', 'id_area', 'progresivo', 'estado', 'created_by', 'updated_by'], 'integer'],
            [['fecha', 'resguardante', 'observaciones', 'created_at', 'updated_at'], 'safe'],
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
    public function search($params,$idp)
    {
        $query = InvAsignaciones::find();

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

        $id_plantel = Yii::$app->user->identity->id_plantel;


        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_periodo' => $idp,
            'id_mes' => $this->id_mes,
            'id_plantel' => $id_plantel,
            'id_area' => $this->id_area,
            'progresivo' => $this->progresivo,
            'fecha' => $this->fecha,
            'estado' => $this->estado,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'resguardante', $this->resguardante])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
