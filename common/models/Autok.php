<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%autok}}".
 *
 * @property int $auto_id
 * @property string $gyarto
 * @property string $tipus
 * @property string $rendszam
 * @property int|null $gyartasi_ev
 */
class Autok extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%autok}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gyarto', 'tipus', 'rendszam', 'gyartasi_ev'], 'required'],
            [['auto_id', 'gyartasi_ev'], 'integer'],
            [['gyarto', 'tipus', 'rendszam'], 'string', 'max' => 512],
            [['auto_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'auto_id' => 'Auto ID',
            'gyarto' => 'Gyártó',
            'tipus' => 'Típus',
            'rendszam' => 'Rendszám',
            'gyartasi_ev' => 'Gyártási Év',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\AutokQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AutokQuery(get_called_class());
    }
}
