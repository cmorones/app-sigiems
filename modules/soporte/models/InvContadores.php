<?php

namespace app\modules\soporte\models;

use Yii;

/**
 * This is the model class for table "inv_contadores".
 *
 * @property integer $id
 * @property integer $id_plantel
 * @property integer $id_impresora
 * @property integer $id_periodo
 * @property integer $id_mes
 * @property integer $contador_inicial
 * @property integer $contador_final
 * @property integer $porcentaje
 * @property integer $status_cambio
 * @property string $documento
 * @property integer $status
 * @property string $observaciones
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class InvContadores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_contadores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_plantel', 'id_impresora', 'id_periodo', 'id_mes', 'contador_inicial', 'contador_final', 'porcentaje', 'status_cambio', 'status', 'created_by', 'updated_by'], 'integer'],
            [['documento', 'observaciones'], 'string'],
            [['created_at', 'created_by'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
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
            'id_impresora' => 'Id Impresora',
            'id_periodo' => 'Id Periodo',
            'id_mes' => 'Id Mes',
            'contador_inicial' => 'Contador Inicial',
            'contador_final' => 'Contador Final',
            'porcentaje' => 'Porcentaje',
            'status_cambio' => 'Status Cambio',
            'documento' => 'Documento',
            'status' => 'Status',
            'observaciones' => 'Observaciones',
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
}
