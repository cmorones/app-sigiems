<?php

namespace app\modules\consumibles\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\consumibles\models\InvConsumibles;
use  yii\web\Session;

/**
 * InvConsumiblesSearch represents the model behind the search form about `app\modules\consumibles\models\InvConsumibles`.
 */
class InvConsumiblesSearch extends InvConsumibles
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_consumible', 'id_ubicacion',  'created_by', 'updated_by', 'id_area'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
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
        $query = InvConsumibles::find();

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
            'id_consumible' => $this->id_consumible,
            'id_ubicacion' => $this->id_ubicacion,
            'existencia' => $this->existencia,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
             'id_area' => $perfil,
        ]);

    $session = Yii::$app->session;
    $session->set('exportData', $dataProvider);

        return $dataProvider;
    }

     public static function getExportData() 
    {
        $session = Yii::$app->session;
        $data = [
            'data'=>$session->get('exportData'),
            'fileName'=>'Ordenes--List', 
            'title'=>'Listado de Ordenes',
            'exportFile'=>'@app/modules/consumibles/views/inv-consumibles/InvConsumiblesExportPdfExcel',
        ];
        //print_r($data);exit;

    return $data;
    }
}
