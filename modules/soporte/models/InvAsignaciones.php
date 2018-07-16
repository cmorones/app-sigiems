<?php

namespace app\modules\soporte\models;

use Yii;

/**
 * This is the model class for table "inv_asignaciones".
 *
 * @property integer $id
 * @property integer $id_plantel
 * @property integer $id_area
 * @property integer $progresivo
 * @property string $fecha
 * @property integer $estado
 * @property string $resguardante
 * @property string $observaciones
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class InvAsignaciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_asignaciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo','id_periodo','id_mes','id_plantel', 'id_area', 'progresivo', 'estado', 'created_by', 'updated_by','sustitucion'], 'integer'],
            [['fecha', 'created_at', 'updated_at'], 'safe'],
            [['resguardante', 'observaciones','autoriza','entrega','recibe', 'detalle_sus'], 'string'],
            [['folio','progresivo','created_at', 'created_by'], 'required'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['created_by' => 'user_id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['updated_by' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_plantel' => 'Id Plantel',
            'id_periodo' => 'Id Periodo',
            'id_tipo' => 'Tipo',
            'id_mes' => 'Id Mes',
            'id_area' => 'Id Area',
            'progresivo' => 'Progresivo',
            'fecha' => 'Fecha',
            'estado' => 'Estado',
            'resguardante' => 'Resguardante',
            'observaciones' => 'Observaciones',
            'autoriza'=> 'Autoriza',
            'recibe' => 'Recibe',
            'entrega' => 'Entrega',
            'sustitucion' => 'Sustitucion',
            'detalle_sus' => 'Detalle Sustitucuion',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'updated_by']);
    }


     public function getCatAreas()
    {
        return $this->hasOne(CatAreas::className(),['id_area'=>'id_area']);
    }

     public function getCatPlanteles()
    {
        return $this->hasOne(CatPlanteles::className(),['id'=>'id_plantel']);
    }

  

     public function getCatEstado()
    {
        return $this->hasOne(CatEstado::className(),['id'=>'estado']);
    }

     public function getCatAnos()
    {
        return $this->hasOne(CatAnos::className(),['id'=>'id_periodo']);
    }

    public function getCatMeses()
    {
        return $this->hasOne(CatMeses::className(),['id'=>'id_mes']);
    }
}
