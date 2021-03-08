<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AuthProjectModule;

/**
 * AuthProjectModuleSearch represents the model behind the search form of `backend\models\AuthProjectModule`.
 */
class AuthProjectModuleSearch extends AuthProjectModule
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_autoid', 'sortOrder', 'admin_lead_opn'], 'integer'],
            [['moduleName', 'moduleCode', 'moduleCode2', 'moduleCode3', 'moduleMultiple', 'moduelRoot', 'user_url', 'userAction', 'FAIcon', 'user_rights', 'is_active', 'module_show_status'], 'safe'],
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
        $query = AuthProjectModule::find();

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
            'p_autoid' => $this->p_autoid,
            'sortOrder' => $this->sortOrder,
            'admin_lead_opn' => $this->admin_lead_opn,
        ]);

        $query->andFilterWhere(['like', 'moduleName', $this->moduleName])
            ->andFilterWhere(['like', 'moduleCode', $this->moduleCode])
            ->andFilterWhere(['like', 'moduleCode2', $this->moduleCode2])
            ->andFilterWhere(['like', 'moduleCode3', $this->moduleCode3])
            ->andFilterWhere(['like', 'moduleMultiple', $this->moduleMultiple])
            ->andFilterWhere(['like', 'moduelRoot', $this->moduelRoot])
            ->andFilterWhere(['like', 'user_url', $this->user_url])
            ->andFilterWhere(['like', 'userAction', $this->userAction])
            ->andFilterWhere(['like', 'FAIcon', $this->FAIcon])
            ->andFilterWhere(['like', 'user_rights', $this->user_rights])
            ->andFilterWhere(['like', 'is_active', $this->is_active])
            ->andFilterWhere(['like', 'module_show_status', $this->module_show_status]);

        return $dataProvider;
    }
}
