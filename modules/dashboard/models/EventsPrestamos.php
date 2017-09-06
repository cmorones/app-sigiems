<?php

/*****************************************************************************************
 * EduSec  Open Source Edition is a School / College management system developed by
 * RUDRA SOFTECH. Copyright (C) 2010-2015 RUDRA SOFTECH.

 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see http://www.gnu.org/licenses. 

 * You can contact RUDRA SOFTECH, 1st floor Geeta Ceramics, 
 * Opp. Thakkarnagar BRTS station, Ahmedbad - 382350, India or
 * at email address info@rudrasoftech.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * RUDRA SOFTECH" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by RUDRA SOFTECH".
 *****************************************************************************************/

/**
 * @package EduSec.modules.dashboard.models
 */

namespace app\modules\dashboard\models;
use app\modules\admin\models\Users;
use app\modules\admin\models\CatAreas;
use app\modules\soporte\models\EstadoPresta;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property integer $event_id
 * @property string $event_title
 * @property string $event_detail
 * @property string $event_start_date
 * @property string $event_end_date
 * @property integer $event_type
 * @property string $event_url
 * @property integer $event_all_day
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $is_status
 */
class EventsPrestamos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
     public $file;

    public static function tableName()
    {
        return 'events_prestamo';
    }
  
    public static function find()
    {
	return parent::find()->andWhere(['<>', 'is_status', 2]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_start_date', 'event_end_date', 'event_type', 'created_at', 'created_by','tecnico'], 'required', 'message' => ''],
            [['estado', 'id_piso', 'id_area', 'id_plantel', 'especificar', 'estado_ext', 'estado_mouse', 'estado_imp', 'estado_proye', 'estado_lap', 'otro', 'impresora', 'exten', 'mouse', 'video_proye', 'laptop','responsable', 'ticket','event_start_date', 'event_end_date', 'created_at', 'updated_at',  'progresivo_impresora', 'progresivo_proyector', 'progresivo_laptop'], 'safe'],
            [['event_type', 'event_all_day', 'created_by', 'updated_by', 'is_status','folio'], 'integer'],
            [['event_title'], 'string', 'max' => 80],
            [['event_detail', 'event_url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
			'event_id' => Yii::t('app', 'Event ID'),
            'event_title' => Yii::t('app', 'Actividad'),
            'event_detail' => Yii::t('app', 'Detalle'),
            'event_start_date' => Yii::t('app', 'Entrega'),
            'event_end_date' => Yii::t('app', 'Devolución'),
            'event_type' => Yii::t('app', 'Status'),
            'event_url' => Yii::t('app', 'Url'),
            'event_all_day' => Yii::t('app', 'All Day'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'is_status' => Yii::t('app', 'Is Status'),
            'estado' => Yii::t('app', 'Estado'),
            'id_piso' => Yii::t('app', 'Piso'),
            'id_area' => Yii::t('app', 'Area'),
            'id_plantel' => Yii::t('app', 'Plantel'),
            'progresivo_impresora' => Yii::t('app', 'Progresivo Impresora'),
            'progresivo_proyector' => Yii::t('app', 'Progresivo Proyector'),
            'progresivo_laptop' => Yii::t('app', 'Progresivo Laptop'),
            'especificar' => Yii::t('app', 'Especificar'),
            'estado_ext' => Yii::t('app', 'Estado Extension'),
            'estado_mouse' => Yii::t('app', 'Estado del Mouse'),
            'estado_imp' => Yii::t('app', 'Estado de la Impresora'),
            'estado_proye' => Yii::t('app', 'Estado del Proyector'),
            'estado_lap' => Yii::t('app', 'Estado de Laptop'),
            'otro' => Yii::t('app', 'Otro'),
            'impresora' => Yii::t('app', 'Impresora'),
            'exten' => Yii::t('app', 'Extension'),
            'mouse' => Yii::t('app', 'Mouse'),
            'video_proye' => Yii::t('app', 'Video Proyector'),
            'laptop' => Yii::t('app', 'Laptop'),
            'responsable' => Yii::t('app', 'Responsable'),
             'ticket' => Yii::t('app', 'Ticket'),
            'folio' => Yii::t('app', 'Folio'),
            'tecnico' => Yii::t('app', 'Tecnico'),
        ];
    }
public function getUsers()
    {
        return $this->hasOne(Users::className(),['user_id'=>'tecnico']);
    }
    public function getCatAreas()
    {
        return $this->hasOne(CatAreas::className(),['id_area'=>'id_area']);
    }
     public function getEstadoPresta()
    {
        return $this->hasOne(EstadoPresta::className(),['id'=>'estado']);
    }
    public function getEstadoPresta2()
    {
        return $this->hasOne(EstadoPresta::className(),['id'=>'estado_lap']);
    }
    public function getEstadoPresta3()
    {
        return $this->hasOne(EstadoPresta::className(),['id'=>'estado_imp']);
    }
    public function getEstadoPresta4()
    {
        return $this->hasOne(EstadoPresta::className(),['id'=>'estado_mouse']);
    }
    public function getEstadoPresta5()
    {
        return $this->hasOne(EstadoPresta::className(),['id'=>'estado_ext']);
    }
    public function getEstadoPresta6()
    {
        return $this->hasOne(EstadoPresta::className(),['id'=>'estado_proye']);
    }
}
