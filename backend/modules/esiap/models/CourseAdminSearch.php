<?php

namespace backend\modules\esiap\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\esiap\models\Course;

/**
 * CourseSearch represents the model behind the search form of `backend\modules\esiap\models\Course`.
 */
class CourseAdminSearch extends Course
{
	public $search_course;
	public $search_cat;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['search_course', 'study_level'], 'string'],
			
			[['search_cat'], 'integer'],
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
        $query = Course::find()
		->where(['is_active' => 1, 'is_dummy' => 0, 'faculty_id' => Yii::$app->params['faculty_id']]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'pagination' => [
                'pageSize' => 40,
            ],

        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
		
		// grid filtering conditions
        
		
		if(Yii::$app->params['faculty_id']== 21){
			$query->andFilterWhere(['like', 'component_id', $this->search_cat]);
		}else{
			$query->andFilterWhere(['=', 'program_id', $this->search_cat]);
		}
		
		$query->andFilterWhere(['study_level' => $this->study_level]);
		
		$query->andFilterWhere(['or', 
            ['like', 'course_name', $this->search_course],
            ['like', 'course_name_bi', $this->search_course],
			['like', 'course_code', $this->search_course]
        ]);


        return $dataProvider;
    }
}
