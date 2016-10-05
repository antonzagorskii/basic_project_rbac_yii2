<?php

namespace app\modules\Backend\models;

use Yii;

/**
 * This is the model class for table "orders_product".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $service_id
 */
class OrdersProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'service_id'], 'required'],
            [['order_id', 'service_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'service_id' => 'Service ID',
        ];
    }
}
