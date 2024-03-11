<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Autok]].
 *
 * @see \common\models\Autok
 */
class AutokQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Autok[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Autok|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
