<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Surveys
 *
 * @author denis
 */
class Surveys extends \Phalcon\Mvc\Model
{
    //put your code here
    private $id;
    private $title;
    private $created_data;
    private $required_respondents_count;
    private $is_active;
    private $link;
    
    public function initialize()
    {
        $this->setSource('surveys');
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getLink() {
        return $this->link;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function getIsActive() {
        return $this->is_active;
    }
}
