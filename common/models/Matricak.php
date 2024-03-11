<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%matricak}}".
 *
 * @property int $matrica_id
 * @property int|null $auto_id
 * @property string $lejarat
 * @property string $matrica_tipus
 *
 * @property Autok $auto
 */
class Matricak extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%matricak}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auto_id', 'lejarat', 'matrica_tipus'], 'required'],
            [['matrica_id', 'auto_id'], 'integer'],
            [['lejarat'], 'safe'],
            [['matrica_tipus'], 'string', 'max' => 512],
            [['matrica_id'], 'unique'],
            [['auto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Autok::class, 'targetAttribute' => ['auto_id' => 'auto_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'matrica_id' => 'Matrica ID',
            'auto_id' => 'Autó',
            'lejarat' => 'Lejárat',
            'matrica_tipus' => 'Matrica Típus',
        ];
    }

    /**
     * Gets query for [[Auto]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AutokQuery
     */
    public function getAuto()
    {
        return $this->hasOne(Autok::class, ['auto_id' => 'auto_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\MatricakQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\MatricakQuery(get_called_class());
    }
}
