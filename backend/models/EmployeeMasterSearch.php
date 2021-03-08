<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\EmployeeMaster;

/**
 * EmployeeMasterSearch represents the model behind the search form of `backend\models\EmployeeMaster`.
 */
class EmployeeMasterSearch extends EmployeeMaster
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'EmployeeType', 'ContactNo'], 'integer'],
            [['EmployeeName', 'EmployeeId', 'TypeName', 'EmailId', 'Designation', 'Address', 'Status', 'CreatedAt', 'ModifiedAt', 'UpdatedIpaddress'], 'safe'],
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
        $query = EmployeeMaster::find();

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
            'EmployeeType' => $this->EmployeeType,
            'ContactNo' => $this->ContactNo,
            'CreatedAt' => $this->CreatedAt,
            'ModifiedAt' => $this->ModifiedAt,
        ]);

        $query->andFilterWhere(['like', 'EmployeeName', $this->EmployeeName])
            ->andFilterWhere(['like', 'EmployeeId', $this->EmployeeId])
            ->andFilterWhere(['like', 'TypeName', $this->TypeName])
            ->andFilterWhere(['like', 'EmailId', $this->EmailId])
            ->andFilterWhere(['like', 'Designation', $this->Designation])
            ->andFilterWhere(['like', 'Address', $this->Address])
            ->andFilterWhere(['like', 'Status', $this->Status])
            ->andFilterWhere(['like', 'UpdatedIpaddress', $this->UpdatedIpaddress]);

        return $dataProvider;
    }
}
