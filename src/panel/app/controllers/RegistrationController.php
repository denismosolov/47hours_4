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
        $registrationForm->setAction('/registration');
        $postData = $this->request->getPost();

        if($postData){
            if($registrationForm->isValid($postData)){
                $user = new \Users();
                $user->setEmail($this->request->get('email'));

                $password = \Users::generatePassword(7);
                $user->setPassword(md5($password));

                $user->setIsConfirmed(0);
                $user->setIsActive(0);

                $user->setLastUpdatedDate(('Y-m-d H:i:s'));
                $user->setCreatedDate(date('Y-m-d H:i:s'));
                $user->save();

                $this->view->setVar('success', $password);
            }else{

            }
        }
        $this->view->setVar('form', $registrationForm);
    }
}