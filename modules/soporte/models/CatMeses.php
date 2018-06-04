<?php

namespace app\modules\soporte\models;

use Yii;

/**
 * This is the model class for table "cat_meses".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $status
 */
class CatMeses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_meses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'status' => 'Status',
        ];
    }
}
