<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "automobile".
 *
 * @property int $id
 * @property string $name
 * @property int $color_id
 * @property int $position_id
 * @property string $content
 * @property double $price
 * @property int $count
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Color $color
 * @property Position $position
 */
class Automobile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'automobile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'color_id', 'position_id', 'content', 'price', 'count'], 'required'],
            [['color_id', 'position_id', 'count'], 'integer'],
            [['content'], 'string'],
            [['price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['color_id'], 'exist', 'skipOnError' => true, 'targetClass' => Color::className(), 'targetAttribute' => ['color_id' => 'id']],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['position_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Markasi',
            'color_id' => 'Rangi',
            'position_id' => 'Pozitsiyasi',
            'content' => 'Xarakteristika',
            'price' => 'Narx',
            'count' => 'Soni',
            'created_at' => 'Yaratilgan',
            'updated_at' => "Qo'shilgan",
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColor()
    {
        return $this->hasOne(Color::className(), ['id' => 'color_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'position_id']);
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
