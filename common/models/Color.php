<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "color".
 *
 * @property int $id
 * @property string $code
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Automobile[] $automobiles
 */
class Color extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'color';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'description'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['code'], 'string', 'max' => 5],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Rang kodi',
            'description' => 'Izoh',
            'created_at' => 'Yartilgan',
            'updated_at' => 'Yangilangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutomobiles()
    {
        return $this->hasMany(Automobile::className(), ['color_id' => 'id']);
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
        ];
    }
}