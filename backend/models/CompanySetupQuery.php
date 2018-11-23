<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Expense]].
 *
 * @see Expense
 */
class CompanySetupQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Expense[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Expense|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
