<?php

namespace app\models;

use yii\base\Model;
use app\models\Teacher;
use app\models\Learner;
use app\models\Tlrel;

class RellearnerForm extends Model
{
    public $tname;
    public $lname;
    
    public function rules()
    {
        return [
            [['tname', 'lname'], 'required'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'tname' => 'Имя и фамилия учителя',
            'lname' => 'Имя и фамилия ученика'
        ];
    }
    
    public function save()
    {
        if(!$this->validate()) {
            return false;
        }
        
        $t = Teacher::findOne(['name' => $this->tname]);
        if (!$t) {
            $this->addError('tname', 'Учитель не найден');
            return false;
        }
        
        $l = Learner::findOne(['name' => $this->lname]);
        if (!$l) {
            $this->addError('lname', 'Ученик не найден');
            return false;
        }
        
        $check = Tlrel::findOne(['teacher_id'=> $t->id, 'learner_id'=>$l->id]);

        if($check) {
            $this->addError('tname', 'Этот учитель уже назначен этому ученику');
            return false;
        }
        
        $tlrel = new Tlrel();
        $tlrel->teacher_id = $t->id;
        $tlrel->learner_id = $l->id;

        $tlrel->save();
        
        return true;
    }
}

