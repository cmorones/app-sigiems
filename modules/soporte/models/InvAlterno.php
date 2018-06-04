<?php

namespace app\modules\soporte\models;
use app\modules\admin\models\CatPlanteles;
use app\modules\admin\models\CatAreas;

use Yii;

/**
 * This is the model class for table "inv_alterno".
 *
 * @property integer $id
 * @property integer $id_equipo
 * @property integer $id_motivo
 * @property integer $id_plantel
 * @property string $ubicacion
 * @property integer $id_area
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
class InvAlterno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $progresivo;

    public static function tableName()
    {
        return 'inv_alterno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_equipo', 'id_motivo', 'id_plantel', 'id_area', 'created_by', 'updated_by'], 'integer'],
            [['ubicacion', 'usuario', 'observaciones', 'observaciones2'], 'string'],
            [['created_at', 'created_by'], 'required'],
            [['fecha','created_at', 'updated_at'], 'safe'],
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
            'id_equipo' => 'Equipo',
            'id_motivo' => 'Motivo',
            'id_plantel' => 'Plantel',
            'ubicacion' => 'Ubicacion',
            'id_area' => 'Id Area',
            'usuario' => 'Usuario',
            'observaciones' => 'Observaciones',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'observaciones2' => 'Cargo',
            'progresivo' => 'Progresivo',
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


    public function getCatPlanteles()
    {
        return $this->hasOne(CatPlanteles::className(),['id'=>'id_plantel']);
    }

      public function getCatAreas()
    {
        return $this->hasOne(CatAreas::className(),['id_area'=>'id_area']);
    }

    public function getCatProgresivo()
    {
        return $this->hasOne(InvEquipos::className(),['id'=>'id_equipo']);
    }
}
