<?php

namespace app\modules\Backend\models;

use Yii;

/**
 * This is the model class for table "orders_additional_work".
 *
 * @property integer $id
 * @property integer $order_id
 * @property string $name
 * @property double $price
 */
class OrdersAdditionalWork extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders_additional_work';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'name', 'price'], 'required'],
            [['order_id'], 'integer'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'price' => 'Price',
        ];
    }
}
