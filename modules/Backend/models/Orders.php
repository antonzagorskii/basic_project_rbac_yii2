<?php

namespace app\modules\Backend\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $dt_create
 * @property integer $status_id
 * @property string $dt_plan
 * @property string $number_dogovor
 * @property integer $manager_id
 * @property integer $master_id
 * @property double $prise_base
 * @property double $discount
 * @property string $fio
 * @property string $phone
 * @property string $address
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dt_create', 'dt_plan'], 'safe'],
            [['status_id', 'dt_plan', 'number_dogovor', 'manager_id', 'master_id', 'prise_base', 'discount', 'fio', 'phone', 'address'], 'required'],
            [['status_id', 'manager_id', 'master_id'], 'integer'],
            [['prise_base', 'discount'], 'number'],
            [['number_dogovor'], 'string', 'max' => 10],
            [['fio', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dt_create' => 'Дата создания',
            'status_id' => 'Статус' ,
            'dt_plan' => 'Дата монтажа',
            'number_dogovor' => 'Номер договора',
            'manager_id' => 'Менеджер',
            'master_id' => 'Мастер',
            'prise_base' => 'Цена базовая',
            'discount' => 'Скидка',
            'fio' => 'ФИО',
            'phone' => 'Телефон',
            'address' => 'Адрес',
        ];
    }
}
