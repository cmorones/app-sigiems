<?php

namespace app\modules\consumibles\models;

use Yii;

/**
 * This is the model class for table "consumibles".
 *
 * @property integer $id
 * @property integer $id_medida
 * @property integer $id_categoria
 * @property string $nombre
 * @property string $detalle
 * @property string $imagen
 * @property double $precio
 * @property integer $status
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class Consumibles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'consumibles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_medida', 'existencia_min', 'id_area','existencia_max','status', 'created_by', 'updated_by', 'id_area'], 'integer'],
            [['nombre', 'detalle', 'imagen'], 'string'],
            [['precio'], 'number'],
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
            'id_medida' => 'Id Medida',
            'nombre' => 'Nombre',
            'detalle' => 'Detalle',
            'imagen' => 'Imagen',
            'precio' => 'Precio',
            'status' => 'Status',
            'existencia_min' => 'Existencia Minima',
            'existencia_man' => 'Existencia Minima',
            'id_area' => 'Area',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
             'id_area' => 'Area',
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

     public function getCatMedidas()
    {
        return $this->hasOne(CatMedidas::className(),['id'=>'id_medida']);
    }

    function getInfoProductBy($id){
        $data = Consumibles::find()->asArray()->where(['id'=>$id])->one();
        return $data;
    }
}
