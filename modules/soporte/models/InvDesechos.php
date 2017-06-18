<?php

namespace app\modules\soporte\models;

use Yii;

/**
 * This is the model class for table "inv_desechos".
 *
 * @property integer $id
 * @property integer $id_plantel
 * @property integer $marca
 * @property integer $modelo
 * @property integer $tipo
 * @property string $serie
 * @property integer $id_periodo
 * @property integer $id_area
 * @property integer $id_piso
 * @property string $observaciones
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by

 */
class InvDesechos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_desechos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_plantel', 'marca', 'modelo', 'tipo', 'id_periodo', 'id_area', 'id_piso', 'created_by', 'updated_by'], 'integer'],
            [['serie', 'observaciones'], 'string'],
            [['id_plantel','marca','modelo','tipo','serie','id_periodo','id_area','id_piso','observaciones'], 'required'],
            [['id_plantel','marca','modelo','tipo','serie','id_periodo','id_area','id_piso','observaciones'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_plantel' => 'Plantel',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'tipo' => 'Tipo',
            'serie' => 'Serie',
            'id_periodo' => 'Periodo',
            'id_area' => 'Área',
            'id_piso' => 'Piso',
            'observaciones' => 'Observaciones',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            
        ];
    }
            public function getcatDesechos()
    {
        return $this->hasOne(CatDesechos::className(),['id'=>'tipo']);
    }
                public function getcatMarca()
    {
        return $this->hasOne(CatMarca::className(),['id'=>'marca']);
    }
}
