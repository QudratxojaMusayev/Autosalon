<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "login_journal".
 *
 * @property int $id
 * @property int $admin_id
 * @property string $login_time
 * @property string $browser
 * @property string $device
 * @property string $os
 * @property string $ip_address
 *
 * @property User $admin
 */
class LoginJournal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'login_journal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['admin_id'], 'integer'],
            [['login_time'], 'safe'],
            [['browser', 'ip_address', 'device', 'os'], 'string', 'max' => 255],
            [['admin_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['admin_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'admin_id' => 'Admin ID',
            'login_time' => 'Login Time',
            'browser' => 'Browser',
            'device' => 'Device',
            'os' => 'OS',
            'ip_address' => 'Ip Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(User::className(), ['id' => 'admin_id']);
    }
}
