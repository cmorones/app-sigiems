<?php

namespace app\modules\consumibles\models;


use Yii;
use app\modules\admin\models\CatAreas;
use app\modules\admin\models\CatPlanteles;

/**
 * This is the model class for table "cons_salidas".
 *
 * @property integer $id
 * @property integer $folio
 * @property string $sfolio
 * @property integer $id_plantel_origen
 * @property integer $id_area_origen
 * @property integer $id_plantel_destino
 * @property integer $id_area_destino
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
 * @property double $total
 * @property string $fecha_reg
 * @property string $observaciones
 * @property string $autoriza
 * @property string $entrega
 * @property string $recibe
 * @property string $docto
 * @property integer $estado
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class ConsSalidas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;
 
    public static function tableName()
    {
        return 'cons_salidas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['folio', 'id_plantel_origen', 'id_area_origen', 'id_plantel_destino', 'id_area_destino', 'suministro', 'prestamo', 'salida', 'equipo', 'refaccion', 'material', 'tipo_manto', 'actualizacion', 'distribucion', 'garantia', 'estado', 'created_by', 'updated_by'], 'integer'],
            [['sfolio', 'condiciones', 'observaciones', 'autoriza', 'entrega', 'recibe', 'docto'], 'string'],
            [['total'], 'number'],
            [['file'], 'file', 'on'=>'updoc'],
            [['fecha_reg', 'created_at', 'updated_at'], 'safe'],
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
            'folio' => 'Folio',
            'sfolio' => 'Sfolio',
            'id_plantel_origen' => 'Id Plantel Origen',
            'id_area_origen' => 'Id Area Origen',
            'id_plantel_destino' => 'Id Plantel Destino',
            'id_area_destino' => 'Id Area Destino',
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
            'total' => 'Total',
            'fecha_reg' => 'Fecha Reg',
            'observaciones' => 'Observaciones',
            'autoriza' => 'Autoriza',
            'entrega' => 'Entrega',
            'recibe' => 'Recibe',
            'docto' => 'Docto',
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
        return $this->hasOne(CatAreas::className(),['id_area'=>'id_area_origen']);
    }


    public function getCatAreas2()
    {
        return $this->hasOne(CatAreas::className(),['id_area'=>'id_area_destino']);
    }

     public function getCatPlanteles()
    {
        return $this->hasOne(CatPlanteles::className(),['id'=>'id_plantel_origen']);
    }

    public function getCatPlanteles2()
    {
        return $this->hasOne(CatPlanteles::className(),['id'=>'id_plantel_destino']);
    }

    public function getCatEstado()
    {
        return $this->hasOne(CatEstado::className(),['id'=>'estado']);
    }
}
