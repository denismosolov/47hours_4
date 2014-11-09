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
        if ($this->session->has("curr_user")) {
            header("Location: /cabinet");
            return;
        }

        $loginForm = new \LoginForm();
        $loginForm->setAction('/login');
        if($this->request->isPost())
        {
            if($loginForm->isValid($this->request->getPost())){
                $userEmail = $this->request->get("email", "email");
                $userPassword = $this->request->get("password", "string");
                $user = \Users::ifUserExist($userEmail, $userPassword)->getFirst();
                if($user){
                    $this->session->set("curr_user", $user);
                    $this->response->redirect('cabinet');
                }else{
                    $this->view->setVar('nf', true);
                }
            }else{
                $this->view->setVar('err', true);
            }
        }
        $this->view->setVar('form', $loginForm);
    }
}