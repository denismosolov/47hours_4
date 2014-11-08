<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 11/8/14
 * Time: 3:47 PM
 */

class LoginController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
        $loginForm = new \LoginForm();
        $loginForm->setAction('/login');
        if($this->request->isPost())
        {
            $userEmail = $this->request->get("email", "email");
            $userPassword = $this->request->get("password", "string");

            if($loginForm->isValid($_POST)){
                
            }
            exit;

            // Send email with confirmation code to user email
        }else{
            // Something wrong
        }
        $this->view->setVar('form', $loginForm);
    }
}