<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "automobile".
 *
 * @property int $id
 * @property int $marka_id
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
 * @property Marka $marka
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
            [['marka_id', 'color_id', 'position_id', 'content', 'price', 'count'], 'required'],
            [['marka_id', 'color_id', 'position_id', 'count'], 'integer'],
            [['content'], 'string'],
            [['price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['color_id'], 'exist', 'skipOnError' => true, 'targetClass' => Color::className(), 'targetAttribute' => ['color_id' => 'id']],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['position_id' => 'id']],
            [['marka_id'], 'exist', 'skipOnError' => true, 'targetClass' => Marka::className(), 'targetAttribute' => ['marka_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'marka_id' => 'Markasi',
            'color_id' => 'Rangi',
            'position_id' => 'Pozitsiyasi',
            'content' => 'Xaraketeristika',
            'price' => 'Narxi',
            'count' => 'Soni',
            'created_at' => 'Yaratilgan',
            'updated_at' => 'Yangilangan',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarka()
    {
        return $this->hasOne(Marka::className(), ['id' => 'marka_id']);
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
