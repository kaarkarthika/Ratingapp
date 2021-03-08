<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CustomerDetails;

/**
 * CustomerDetailsSearch represents the model behind the search form of `backend\models\CustomerDetails`.
 */
class CustomerDetailsSearch extends CustomerDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ContactNo', 'Floor', 'Employee'], 'integer'],
            [['CustomerName', 'EmailId', 'Address', 'Question1', 'Question2', 'Question3', 'Question4', 'Question5', 'CreatedAt', 'floor_name','employee_name','UpdatedAt', 'UpdatedIpaddress'], 'safe'],
            [['QuestionRating1', 'QuestionRating2', 'QuestionRating3', 'QuestionRating4', 'QuestionRating5', 'average_rating'], 'number'],
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
        $query = CustomerDetails::find()->joinWith(['employeemaster','floormaster']);

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
            'ContactNo' => $this->ContactNo,
          //  'Floor' => $this->Floor,
          //  'Employee' => $this->Employee,
            'QuestionRating1' => $this->QuestionRating1,
            'QuestionRating2' => $this->QuestionRating2,
            'QuestionRating3' => $this->QuestionRating3,
            'QuestionRating4' => $this->QuestionRating4,
            'QuestionRating5' => $this->QuestionRating5,
            'average_rating' => $this->average_rating,
            'CreatedAt' => $this->CreatedAt,
            'UpdatedAt' => $this->UpdatedAt,
        ]);

        $query->andFilterWhere(['like', 'CustomerName', $this->CustomerName])
            ->andFilterWhere(['like', 'EmailId', $this->EmailId])
            ->andFilterWhere(['like', 'Address', $this->Address])
            ->andFilterWhere(['like', 'Question1', $this->Question1])
            ->andFilterWhere(['like', 'Question2', $this->Question2])
            ->andFilterWhere(['like', 'Question3', $this->Question3])
            ->andFilterWhere(['like', 'Question4', $this->Question4])
            ->andFilterWhere(['like', 'Question5', $this->Question5])
            ->andFilterWhere(['like', 'floor_master.FloorName', $this->floor_name])
            ->andFilterWhere(['like', 'employee_master.EmployeeName', $this->employee_name])
            ->andFilterWhere(['like', 'UpdatedIpaddress', $this->UpdatedIpaddress]);

        return $dataProvider;
    }
}
