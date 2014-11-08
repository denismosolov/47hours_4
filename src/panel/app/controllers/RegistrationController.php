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
        if($this->request->isPost()){
            $user = new \Users();
            $user->email = $this->request->get('email');
            \Mailer::sendMail($user->email, 'Тестовое сообщение', 'Здесь будет ссылка');
        }else{

        }
        $this->view->setVar('form', $registrationForm);
    }
}