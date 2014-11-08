<?php
/**
 * Created by IntelliJ IDEA.
 * User: leonid
 * Date: 08.11.14
 * Time: 19:43
 */

class SurveyResult extends \Phalcon\Mvc\Model{
    protected $user_id;
    protected $survey_id;
    protected $started_date;
    protected $completed_date;
    protected $is_passed;

    public function initialize(){
        $this->setSource("users_surveys");
    }

    public function isValid(){
        //TODO
        return true;
    }

    public static function addNewResult($uid,$sid,$sdate,$cdate,$ispassed){
        $surveyResult = new SurveyResult();
        $surveyResult->create(array(
            'user_id' =>$uid,
            'survey_id' =>$sid,
            'started_date' =>$sdate,
            'completed_date' =>$cdate,
            'is_passed' => $ispassed,
        ));
    }

}