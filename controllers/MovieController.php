<?php

namespace app\controllers;

use app\models\ArticleSearch;
use app\models\Movie;
use app\models\MovieSearch;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;


class MovieController extends Controller
{

    public function behaviors()
    {
        return array_merge([
            [
            'class' => AccessControl::class,
            'only' => ['create','update','delete'],
            'rules' =>[
                [
                    'actions' => ['update','create','delete'],
                    'allow' => true,
                    'roles' => ['@']
                ]
            ]
            ]
        ]);
    }

    public function actionIndex(){
        $searchModel = new MovieSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate(){
        $model = new Movie();

        if($this->request->isPost){
            if($model->load($this->request->post()) && $model->save()){
                return $this->redirect(['view', 'slug' => $model->slug]);
            }
        }else{
            $model->loadDefaultValues();
        }
        return $this->render('create',[
            'model' => $model
        ]);
    }
    public function actionUpdate($slug){
        return "UPDATE" . $slug;
    }

    public function actionDelete($slug){
        $model = Movie::findOne(['slug'=>$slug]);
        if(\Yii::$app->user->id !== $model->id){
            throw new ForbiddenHttpException('No puedes realizar esta acción');
        }
        if($model!==null){
            $model->delete();
        }else{
            throw new NotFoundHttpException('No se ha podido encontrar el recurso');
        }
        return $this->redirect(['index']);


    }
    public function actionView($slug){
        return $this->render('view',['model'=>$this->findModel($slug)]);
    }

    protected function findModel($slug){
        $model = Movie::findOne(['slug'=>$slug]);
        if($model!==null){
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exits');
        }
    }


}