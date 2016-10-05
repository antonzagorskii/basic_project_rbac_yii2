<?php

namespace app\modules\Backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\Backend\models\Orders;

/**
 * OrdersSearch represents the model behind the search form about `\app\modules\Backend\models\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status_id', 'manager_id', 'master_id'], 'integer'],
            [['dt_create', 'dt_plan', 'number_dogovor', 'fio', 'phone', 'address'], 'safe'],
            [['prise_base', 'discount'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Orders::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'dt_create' => $this->dt_create,
            'status_id' => $this->status_id,
            'dt_plan' => $this->dt_plan,
            'manager_id' => $this->manager_id,
            'master_id' => $this->master_id,
            'prise_base' => $this->prise_base,
            'discount' => $this->discount,
        ]);

        $query->andFilterWhere(['like', 'number_dogovor', $this->number_dogovor])
            ->andFilterWhere(['like', 'fio', $this->fio])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
