<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 11/8/14
 * Time: 10:06 PM
 */

class RegistrationController extends \Phalcon\Mvc\Controller
{
    public function indexAction(){
        $registrationForm = new \RegistrationForm();
        $this->view->setVar('form', $registrationForm);
    }
}