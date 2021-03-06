<?php

namespace app\modules\soporte\models;

use Yii;

/**
 * This is the model class for table "cat_anos".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $orden
 * @property integer $status
 */
class CatAnos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_anos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orden', 'status'], 'integer'],
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
            'orden' => 'Orden',
            'status' => 'Status',
        ];
    }
}
