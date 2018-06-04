<?php

namespace app\modules\soporte\models;

use Yii;
use app\modules\admin\models\CatAreas;
use app\modules\admin\models\CatPlanteles;

/**
 * This is the model class for table "mov_bienes".
 *
 * @property integer $id
 * @property integer $id_plantel
 * @property integer $folio
 * @property string $fecha
 * @property integer $area_origen
 * @property integer $area_destino
 * @property integer $suministro
 * @property integer $prestamo
 * @property integer $salida
 * @property integer $equipo
 * @property integer $refaccion
 * @property integer $material
 * @property integer $tipo_manto
 * @property integer $actualizacion
 * @property integer $distribucion
 * @property integer $garantia
 * @property string $condiciones
 * @property string $observaciones
 * @property string $autoriza
 * @property string $entrega
 * @property string $recibe
 * @property integer $estado
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class MovBienes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
public $file;

    public static function tableName()
    {
        return 'mov_bienes';
    }

    /**
     * @inheritdoc
     */
    

    public function rules()
    {
        return [
            [['id_plantel', 'folio', 'area_origen', 'area_destino', 'suministro', 'prestamo', 'salida', 'equipo', 'refaccion', 'material', 'tipo_manto', 'actualizacion', 'distribucion', 'garantia', 'estado', 'created_by', 'updated_by', 'plantel'], 'integer'],
            [['fecha', 'created_at', 'updated_at'], 'safe'],
            [['file'], 'file', 'on'=>'updoc'],
            [['condiciones', 'observaciones', 'autoriza', 'entrega', 'recibe'], 'string'],
            [['created_at', 'created_by'], 'required'],
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
            'folio' => 'Folio',
            'sfolio' => 'Folio Movimiento',
            'fecha' => 'Fecha',
            'area_origen' => 'Area Origen',
            'area_destino' => 'Area Destino',
            'plantel' => 'Plantel Destino',
            'suministro' => 'Suministro',
            'prestamo' => 'Prestamo',
            'salida' => 'Salida',
            'equipo' => 'Equipo',
            'refaccion' => 'Refaccion',
            'material' => 'Material',
            'tipo_manto' => 'Tipo Manto',
            'actualizacion' => 'Actualizacion',
            'distribucion' => 'Distribucion',
            'garantia' => 'Garantia',
            'condiciones' => 'Condiciones',
            'observaciones' => 'Observaciones',
            'autoriza' => 'Autoriza',
            'entrega' => 'Entrega',
            'recibe' => 'Recibe',
            'estado' => 'Estado',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
             'file'=> 'Subir Archivo',
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

    public function getCatAreas1()
    {
        return $this->hasOne(CatAreas::className(),['id_area'=>'area_origen']);
    }


    public function getCatAreas2()
    {
        return $this->hasOne(CatAreas::className(),['id_area'=>'area_destino']);
    }

     public function getCatPlanteles()
    {
        return $this->hasOne(CatPlanteles::className(),['id'=>'id_plantel']);
    }

    public function getCatPlanteles2()
    {
        return $this->hasOne(CatPlanteles::className(),['id'=>'plantel']);
    }

    public function getCatEstado()
    {
        return $this->hasOne(CatEstado::className(),['id'=>'estado']);
    }
}
