<?php

namespace app\modules\soporte\models;

use Yii;
use app\modules\admin\models\CatPlanteles;
use app\modules\admin\models\CatAreas;
use app\modules\admin\models\CatPisos;
use yii\filters\AccessControl;

/**
 * This is the model class for table "inv_servers".
 *
 * @property integer $id
 * @property integer $progresivo
 * @property integer $id_tipo
 * @property integer $marca
 * @property integer $modelo
 * @property string $serie
 * @property integer $estado
 * @property string $procesador
 * @property string $ram
 * @property string $disco_duro
 * @property integer $id_plantel
 * @property integer $id_area
 * @property integer $id_piso
 * @property integer $clasif
 * @property integer $status
 * @property string $usuario
 * @property string $observaciones
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $observaciones2
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class InvServers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_servers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['progresivo'], 'progresivovalido'],
            [['progresivo', 'id_tipo', 'marca', 'modelo', 'estado', 'id_plantel', 'id_area', 'id_piso', 'clasif', 'status', 'created_by', 'updated_by'], 'integer'],
            [['serie', 'procesador', 'ram', 'disco_duro', 'usuario', 'observaciones', 'observaciones2'], 'string'],
            [['created_at', 'created_by'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['created_by' => 'user_id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['updated_by' => 'user_id']],
        ];
    }


    public function progresivovalido($attribute, $params){


       $cuenta_inv = \Yii::$app->db2->createCommand('SELECT count(progresivo) FROM bienes_muebles where id_situacion_bien=1 and (clave_cabms=\'5151000192\') and progresivo='.$this->progresivo.'')->queryColumn();

       // $cuenta_inv[0] =0;

                if ($cuenta_inv[0] == 0) {

                    return $this->addError("progresivo", "Este progresivo no existe en invetario");
                   //return true;
            }
           
            
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'progresivo' => 'Progresivo',
            'id_tipo' => 'Id Tipo',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'serie' => 'Serie',
            'estado' => 'Estado',
            'procesador' => 'Procesador',
            'ram' => 'Ram',
            'disco_duro' => 'Disco Duro',
            'id_plantel' => 'Id Plantel',
            'id_area' => 'Id Area',
            'id_piso' => 'Id Piso',
            'clasif' => 'Clasif',
            'status' => 'Status',
            'usuario' => 'Usuario',
            'observaciones' => 'Observaciones',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'observaciones2' => 'Observaciones2',
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

    public function getTipoEquipo()
    {
        return $this->hasOne(CatTipoServer::className(),['id'=>'id_tipo']);
    }
      public function getCatMarca()
    {
        return $this->hasOne(CatMserver::className(),['id'=>'marca']);
    }

    public function getCatModelo()
    {
        return $this->hasOne(CatModserver::className(),['id'=>'modelo']);
    }

    public function getEstadoEquipo()
    {
        return $this->hasOne(EstadoEquipo::className(),['id'=>'estado']);
    }
    public function getCatAntiguedad()
    {
        return $this->hasOne(CatAntiguedad::className(),['id'=>'clasif']);
    }

    public function getCatPlanteles()
    {
        return $this->hasOne(CatPlanteles::className(),['id'=>'id_plantel']);
    }

      public function getCatAreas()
    {
        return $this->hasOne(CatAreas::className(),['id_area'=>'id_area']);
    }

      public function getCatPisos()
    {
        return $this->hasOne(CatPisos::className(),['id'=>'id_piso']);
    }

      public function getEstadoServer()
    {
        return $this->hasOne(StatusServer::className(),['id'=>'status']);
    }
}
