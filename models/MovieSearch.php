<?php

namespace app\models;

use yii\base\Model;
use \yii\data\ActiveDataProvider;

class MovieSearch extends Movie
{

    public function rules(){
        return [
            [['id','created_at','updated_at','created_by'],'integer'],
            [['name','slug','description'],'safe']
        ];
    }

    public function scenarios(){
        return Model::scenarios();
    }


    /**
     * Creates a data provider instance with search query applied
     * @param array $params
     * @return ActiveDataProvider
     */

    public function search($params){
        $query = Movie::find()->orderBy('created_at DESC');

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $this->load($params);

        if(!$this->validate()){
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by
        ]);

        $query->andFilterWhere(['like','name', $this->name])
            ->andFilterWhere(['like','slug',$this->slug])
           ->andFilterWhere(['like','description',$this->description]);

        return $dataProvider;
    }

}