<?php

namespace app\models;

use yii\db\ActiveRecord;

class Teacher extends ActiveRecord
{
    public static function getAll($limit, $offset)
    {
        $sql = "SELECT t.*, count(r.id) AS learners FROM teacher AS t LEFT JOIN tlrel AS r ON r.teacher_id=t.id GROUP BY t.id LIMIT :limit OFFSET :offset";
        return self::findBySql($sql, ['limit'=>$limit, 'offset'=>$offset])->asArray()->all();
    }
    
    public static function getAprilLearners($limit, $offset)
    {
        $sql = "SELECT t.* FROM teacher AS t LEFT JOIN tlrel AS r ON r.teacher_id = t.id LEFT JOIN learner AS l ON l.id=r.learner_id WHERE MONTH(l.birthday)='04' GROUP BY t.id LIMIT :limit OFFSET :offset";
        return self::findBySql($sql, ['limit'=>$limit, 'offset'=>$offset])->asArray()->all();
    }
    
    public static function getAprilLearnersCount()
    {
        $sql = "SELECT count(DISTINCT(t.id)) AS cnt FROM teacher AS t, tlrel AS r, learner AS l WHERE r.teacher_id=t.id AND l.id=r.learner_id AND MONTH(l.birthday)='04'";
        $res = self::findBySql($sql)->asArray()->all();
        
        return $res[0]['cnt'];
    }
}

