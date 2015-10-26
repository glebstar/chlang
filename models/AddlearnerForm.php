<?php

namespace app\models;

use yii\base\Model;
use app\models\Learner;

class AddlearnerForm extends Model
{
    public $name;
    public $email;
    public $birthday;
    public $level;
    
    public function rules()
    {
        return [
            [['name', 'email', 'birthday', 'level'], 'required'],
            ['email', 'email'],
            ['birthday', 'date', 'format' => 'yyyy-M-d'],
            ['level','in','range'=>range(1, 6)]
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'name' => 'Имя и фамилия',
            'email' => 'E-mail',
            'birthday' => 'Дата рождения (Г-м-д)',
            'level' => 'Уровень знания языка'
        ];
    }
    
    public function save()
    {
        if(!$this->validate()) {
            return false;
        }
        
        $check = Learner::findOne(['name' => $this->name]);

        if($check) {
            $this->addError('name', 'Ученик с таким именем уже существует');
            return false;
        }
        
        $learner = new Learner();
        $learner->name = $this->name;
        $learner->email = $this->email;
        $learner->birthday = $this->birthday;
        $learner->levellang_id = $this->level;

        $learner->save();
        
        return true;
    }
}

    

