<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InvitedUsers
 *
 * @author denis
 */
class InvitedUsers extends \Phalcon\Mvc\Model 
{
    private $user_id;
    private $survey_id;
    
    public function initialize()
    {
        $this->setSource('invited_users');
    }
    
    public function setUserId($user_id) {
        $this->user_id = strval($user_id);
    }
    
    public function setSurveyId($survey_id) {
        $this->survey_id = strval($survey_id);
    }
    
    public function getUserId() {
        return $this->user_id;
    }
    
    public function getSurveyId() {
        return $this->survey_id;
    }
}
