<?php

namespace app\models;

use yii\base\Model;
use app\models\Teacher;

class AddteacherForm extends Model
{
    public $name;
    public $gender;
    public $phone;
    
    public function rules()
    {
        return [
            [['name', 'gender', 'phone'], 'required'],
            ['gender','in','range'=>['m','f']]
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'name' => 'Имя и фамилия',
            'gender' => 'Выберите пол',
            'phone' => 'Номер телефона'
        ];
    }
    
    public function save()
    {
        if(!$this->validate()) {
            return false;
        }
        
        $check = Teacher::findOne(['name' => $this->name]);

        if($check) {
            $this->addError('name', 'Учитель с таким именем уже существует');
            return false;
        }
        
        $teacher = new Teacher();
        $teacher->name = $this->name;
        $teacher->gender = $this->gender;
        $teacher->phone = $this->phone;
        $teacher->save();
        
        return true;
    }
}

