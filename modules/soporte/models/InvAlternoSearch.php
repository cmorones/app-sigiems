<?php

namespace app\modules\soporte\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\soporte\models\InvAlterno;

/**
 * InvAlternoSearch represents the model behind the search form about `app\modules\soporte\models\InvAlterno`.
 */
class InvAlternoSearch extends InvAlterno
{
    /**
     * @inheritdoc
     */
    public $progresivo;

    public function rules()
    {
        return [
            [['id', 'id_equipo', 'id_motivo', 'id_plantel', 'id_area', 'created_by', 'updated_by'], 'integer'],
            [['progresivo','ubicacion', 'usuario', 'observaciones', 'created_at', 'updated_at', 'observaciones2'], 'safe'],
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
        $query = InvAlterno::find();

        // add conditions that should always apply here

      /*  $query->leftJoin([
    'inv_equipos'
], 'inv_equipos.id = inv_alterno.id_equipo');*/

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                  'pageSize' => 100,
             ],
        ]);

       $query->joinWith(['catProgresivo']);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

      

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'inv_alterno.id_equipo' => $this->id_equipo,
            'inv_alterno.id_motivo' => $this->id_motivo,
            'inv_equipos.progresivo' => $this->progresivo,
            'inv_alterno.id_plantel' => $this->id_plantel,
            'inv_alterno.id_area' => $this->id_area,
            'inv_alterno.created_at' => $this->created_at,
            'inv_alterno.created_by' => $this->created_by,
            'inv_alterno.updated_at' => $this->updated_at,
            'inv_alterno.updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'inv_alterno.ubicacion', $this->ubicacion])
            ->andFilterWhere(['like', 'inv_alterno.usuario', $this->usuario])
            ->andFilterWhere(['like', 'inv_alterno.observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'inv_alterno.observaciones2', $this->observaciones2]);



        return $dataProvider;
    }

        public function search2($params)
    {
        $query = InvAlterno::find();

        // add conditions that should always apply here

      /*  $query->leftJoin([
    'inv_equipos'
], 'inv_equipos.id = inv_alterno.id_equipo');*/

          $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'pagination' => [
                  'pageSize' => 1000,
             ],
             'sort' => [
         'defaultOrder' => [
               'id' => SORT_ASC,
               //'title' => SORT_ASC, 
          ]
          ],
        ]);

     //  $query->joinWith(['catProgresivo']);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

      

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'inv_alterno.id_equipo' => $this->id_equipo,
            'inv_alterno.id_motivo' => $this->id_motivo,
         //   'inv_equipos.progresivo' => $this->progresivo,
            'inv_alterno.id_plantel' => $this->id_plantel,
            'inv_alterno.id_area' => $this->id_area,
            'inv_alterno.created_at' => $this->created_at,
            'inv_alterno.created_by' => $this->created_by,
            'inv_alterno.updated_at' => $this->updated_at,
            'inv_alterno.updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'inv_alterno.ubicacion', $this->ubicacion])
            ->andFilterWhere(['like', 'inv_alterno.usuario', $this->usuario])
            ->andFilterWhere(['like', 'inv_alterno.observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'inv_alterno.observaciones2', $this->observaciones2]);

    $session = Yii::$app->session;
    $session->set('exportData', $dataProvider);

    

        return $dataProvider;
    }

       public static function getExportData() 
    {
        $session = Yii::$app->session;
        $data = [
            'data'=>$session->get('exportData'),
            'fileName'=>'Equipos--List', 
            'title'=>'Listado de Equipos Alternos',
            'exportFile'=>'@app/modules/soporte/views/inv-alterno/InvAlternosExportPdfExcel',
        ];
        //print_r($data);exit;

    return $data;
    }
}
