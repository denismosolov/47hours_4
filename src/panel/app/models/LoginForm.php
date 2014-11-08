<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 11/8/14
 * Time: 6:04 PM
 */

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Submit,
    Phalcon\Forms\Element\Password,
    Phalcon\Mvc\Model\Validator\Email,
    Phalcon\Mvc\Model\Validator\PresenceOf;

class LoginForm extends Form
{
    public function initialize()
    {
        $email = new Text("email");
        $email->addValidator(new PresenceOf(array(
            'message' => 'Это обязательное поле'
        )));
        $email->addValidator(new Email(array(
            'message' => 'Некорректный e-mail формат'
        )));

        $password = new Password("password");
        $password->addValidator(new PresenceOf(array(
            'message' => 'Это обязательное поле'
        )));

        $submit = new Submit('submit', array('value' => 'Регистрация'));

        $this->add($email);
        $this->add($password);
        $this->add($submit);
    }

    public function getCsrf()
    {
        return $this->security->getToken();
    }
}