<?php
/**
 * Created by IntelliJ IDEA.
 * User: leonid
 * Date: 08.11.14
 * Time: 19:43
 */

class UsersSurveys extends \Phalcon\Mvc\Model
{
    
    private $user_id;
    private $survey_id;
    private $started_date;
    private $completed_date;
    private $is_passed;
    
    public function initialize(){
        $this->setSource("users_surveys");
    }
    
    public function isValid(){
        //TODO
        return true;
    }

    public function getUserId() {
        return $this->user_id;
    }
    
    public function getSurveyId() {
        return $this->survey_id;
    }

    public function setUserId($uid) {
        $this->user_id = strval($uid);
    }
    
    public function setSurveyId($sid) {
        $this->survey_id = strval($sid);
    }
    
    public function setStartDate($sdate) {
        $this->started_date = strval($sdate);
    }
    
    public function setCompletedDate($cdate) {
        $this->completed_date = strval($cdate);
    }

    public function setPassed($passed) {
        $this->is_passed = strval($passed);
    }
}