<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Teacher;
use yii\data\Pagination;
use app\models\AddteacherForm;
use app\models\AddlearnerForm;
use app\models\RellearnerForm;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionTeachers($page=1)
    {
        $page = (int)$page;
        if ($page < 1) {
            $page = 1;
        }
        
        $query = Teacher::find();
        
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize'=>10]);
        
        $teachers = Teacher::getAll($pages->limit, $pages->limit * ($page - 1));
        
        return $this->render('teachers', [
            'teachers'=>$teachers,
            'pages' => $pages
            ]);
    }
    
    public function actionAddteacher()
    {
        $model = new AddteacherForm();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('addteacherFormSubmitted');
            
            return $this->refresh();
        }
        
        return $this->render('addteacher', [
            'model' => $model,
        ]);
    }
    
    public function actionAddlearner()
    {
        $model = new AddlearnerForm();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('addlearnerFormSubmitted');
            
            return $this->refresh();
        }
        
        return $this->render('addlearner', [
            'model' => $model,
        ]);
    }
    
    public function actionRellearner()
    {
        $model = new RellearnerForm();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('rellearnerFormSubmitted');
            
            return $this->refresh();
        }
        
        return $this->render('rellearner', [
            'model' => $model,
        ]);
    }
    
    public function actionApril($page=1)
    {   
        $page = (int)$page;
        if ($page < 1) {
            $page = 1;
        }
        
        $pages = new Pagination(['totalCount' => Teacher::getAprilLearnersCount(), 'pageSize'=>10]);
        
        $teachers = Teacher::getAprilLearners($pages->limit, $pages->limit * ($page - 1));
        
        return $this->render('april', [
            'teachers'=>$teachers,
            'pages' => $pages
            ]);
    }
    
    public function actionTwoteacher()
    {
        return $this->render('twoteacher');
    }
}
