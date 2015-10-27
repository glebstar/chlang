<?php

namespace app\commands;

use yii\console\Controller;
use app\models\Teacher;
use app\models\Learner;

class InitController extends Controller
{
    public function actionIndex()
    {
        print("Проверка на существование данных\n");
        
        if(Teacher::find()->count('*') > 0) {
            print("В базе уже есть данные. Не выполнено\n");
            exit;
        }
        
        $maxTeacher = 10000;
        $maxLearner = 100000;
        
        print("Добавляю учителей\n");
        
        for($i=1; $i<=$maxTeacher; $i++) {
            $teacher = new Teacher();
            $teacher->name = "t {$i}";
            $teacher->gender = 'm';
            $teacher->phone = '+70000000000';
            $teacher->save();
        }
        
        $cntT = Teacher::find()->count('*');
        print("Добавлены {$cntT} учителей\n");
        
        print("Добавляю учеников\n");
        
        $years = [1997, 1998, 1999, 2000, 2001, 2002, 2003];
        $months = ['01', '02', '03', '04', '05'];
        
        for($i=1; $i<=$maxLearner; $i++) {
            $learner = new Learner();
            $learner->name = "l {$i}";
            $learner->email = "l{$i}@gmail.com";
            
            $year = $years[rand(0, 6)];
            $month = $months[rand(0, 4)];
            $learner->birthday = "{$year}-{$month}-01";
            $learner->levellang_id = '1';
            $learner->save();
        }
        
        $cntL = Learner::find()->count('*');
        
        print("Добавлены {$cntL} учеников\n");
        print("Готово\n");
    }
}

