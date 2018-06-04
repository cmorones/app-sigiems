<?php

namespace app\modules\consumibles\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $user_id
 * @property string $user_login_id
 * @property string $user_password
 * @property integer $is_block
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $perfil
 * @property integer $id_plantel
 * @property integer $id_profesor
 * @property integer $id_periodo
 * @property string $mail
 * @property string $nombre
 * @property string $cargo
 * @property integer $id_area
 *
 * @property BajasCertificado[] $bajasCertificados
 * @property BajasCertificado[] $bajasCertificados0
 * @property BajasDictamen[] $bajasDictamens
 * @property BajasDictamen[] $bajasDictamens0
 * @property Consumibles[] $consumibles
 * @property Consumibles[] $consumibles0
 * @property InvAlterno[] $invAlternos
 * @property InvAlterno[] $invAlternos0
 * @property InvBajas[] $invBajas
 * @property InvBajas[] $invBajas0
 * @property InvContadores[] $invContadores
 * @property InvContadores[] $invContadores0
 * @property InvEquipos[] $invEquipos
 * @property InvEquipos[] $invEquipos0
 * @property InvEquiposEx[] $invEquiposExes
 * @property InvEquiposEx[] $invEquiposExes0
 * @property InvImpresoras[] $invImpresoras
 * @property InvImpresoras[] $invImpresoras0
 * @property InvImpresorasEx[] $invImpresorasExes
 * @property InvImpresorasEx[] $invImpresorasExes0
 * @property InvNobreak[] $invNobreaks
 * @property InvNobreak[] $invNobreaks0
 * @property InvNobreakEx[] $invNobreakExes
 * @property InvNobreakEx[] $invNobreakExes0
 * @property InvServers[] $invServers
 * @property InvServers[] $invServers0
 * @property InvSo[] $invSos
 * @property InvSo[] $invSos0
 * @property InvSoex[] $invSoexes
 * @property InvSoex[] $invSoexes0
 * @property InvSw[] $invSws
 * @property InvSw[] $invSws0
 * @property InvSwex[] $invSwexes
 * @property InvSwex[] $invSwexes0
 * @property InvTelecom[] $invTelecoms
 * @property InvTelecom[] $invTelecoms0
 * @property InvTelecomEx[] $invTelecomExes
 * @property InvTelecomEx[] $invTelecomExes0
 * @property InvTelefonia[] $invTelefonias
 * @property InvTelefonia[] $invTelefonias0
 * @property MovBienes[] $movBienes
 * @property MovBienes[] $movBienes0
 * @property MovDetalle[] $movDetalles
 * @property MovDetalle[] $movDetalles0
 * @property SoftSlic[] $softSlics
 * @property SoftSlic[] $softSlics0
 * @property SpImpresoras[] $spImpresoras
 * @property SpImpresoras[] $spImpresoras0
 * @property Users $createdBy
 * @property Users[] $users
 * @property Users $updatedBy
 * @property Users[] $users0
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_login_id', 'user_password', 'is_block', 'created_at', 'created_by'], 'required'],
            [['is_block', 'created_by', 'updated_by', 'perfil', 'id_plantel', 'id_profesor', 'id_periodo', 'id_area'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['mail', 'nombre', 'cargo'], 'string'],
            [['user_login_id'], 'string', 'max' => 65],
            [['user_password'], 'string', 'max' => 150],
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
            'user_id' => 'User ID',
            'user_login_id' => 'User Login ID',
            'user_password' => 'User Password',
            'is_block' => 'Is Block',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'perfil' => 'Perfil',
            'id_plantel' => 'Id Plantel',
            'id_profesor' => 'Id Profesor',
            'id_periodo' => 'Id Periodo',
            'mail' => 'Mail',
            'nombre' => 'Nombre',
            'cargo' => 'Cargo',
            'id_area' => 'Id Area',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBajasCertificados()
    {
        return $this->hasMany(BajasCertificado::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBajasCertificados0()
    {
        return $this->hasMany(BajasCertificado::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBajasDictamens()
    {
        return $this->hasMany(BajasDictamen::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBajasDictamens0()
    {
        return $this->hasMany(BajasDictamen::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsumibles()
    {
        return $this->hasMany(Consumibles::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsumibles0()
    {
        return $this->hasMany(Consumibles::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvAlternos()
    {
        return $this->hasMany(InvAlterno::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvAlternos0()
    {
        return $this->hasMany(InvAlterno::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvBajas()
    {
        return $this->hasMany(InvBajas::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvBajas0()
    {
        return $this->hasMany(InvBajas::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvContadores()
    {
        return $this->hasMany(InvContadores::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvContadores0()
    {
        return $this->hasMany(InvContadores::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvEquipos()
    {
        return $this->hasMany(InvEquipos::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvEquipos0()
    {
        return $this->hasMany(InvEquipos::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvEquiposExes()
    {
        return $this->hasMany(InvEquiposEx::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvEquiposExes0()
    {
        return $this->hasMany(InvEquiposEx::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvImpresoras()
    {
        return $this->hasMany(InvImpresoras::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvImpresoras0()
    {
        return $this->hasMany(InvImpresoras::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvImpresorasExes()
    {
        return $this->hasMany(InvImpresorasEx::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvImpresorasExes0()
    {
        return $this->hasMany(InvImpresorasEx::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvNobreaks()
    {
        return $this->hasMany(InvNobreak::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvNobreaks0()
    {
        return $this->hasMany(InvNobreak::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvNobreakExes()
    {
        return $this->hasMany(InvNobreakEx::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvNobreakExes0()
    {
        return $this->hasMany(InvNobreakEx::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvServers()
    {
        return $this->hasMany(InvServers::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvServers0()
    {
        return $this->hasMany(InvServers::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvSos()
    {
        return $this->hasMany(InvSo::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvSos0()
    {
        return $this->hasMany(InvSo::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvSoexes()
    {
        return $this->hasMany(InvSoex::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvSoexes0()
    {
        return $this->hasMany(InvSoex::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvSws()
    {
        return $this->hasMany(InvSw::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvSws0()
    {
        return $this->hasMany(InvSw::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvSwexes()
    {
        return $this->hasMany(InvSwex::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvSwexes0()
    {
        return $this->hasMany(InvSwex::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvTelecoms()
    {
        return $this->hasMany(InvTelecom::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvTelecoms0()
    {
        return $this->hasMany(InvTelecom::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvTelecomExes()
    {
        return $this->hasMany(InvTelecomEx::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvTelecomExes0()
    {
        return $this->hasMany(InvTelecomEx::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvTelefonias()
    {
        return $this->hasMany(InvTelefonia::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvTelefonias0()
    {
        return $this->hasMany(InvTelefonia::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovBienes()
    {
        return $this->hasMany(MovBienes::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovBienes0()
    {
        return $this->hasMany(MovBienes::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovDetalles()
    {
        return $this->hasMany(MovDetalle::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovDetalles0()
    {
        return $this->hasMany(MovDetalle::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoftSlics()
    {
        return $this->hasMany(SoftSlic::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoftSlics0()
    {
        return $this->hasMany(SoftSlic::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpImpresoras()
    {
        return $this->hasMany(SpImpresoras::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpImpresoras0()
    {
        return $this->hasMany(SpImpresoras::className(), ['updated_by' => 'user_id']);
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
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers0()
    {
        return $this->hasMany(Users::className(), ['updated_by' => 'user_id']);
    }
}
