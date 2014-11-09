<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 11/8/14
 * Time: 6:04 PM
 */

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Email as EmailElement,
    Phalcon\Forms\Element\Submit,
    Phalcon\Forms\Element\Password,
    Phalcon\Validation\Validator\Email,
    Phalcon\Validation\Validator\PresenceOf;

class LoginForm extends Form
{
    public function initialize()
    {
        $email = new EmailElement("email");
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

        $submit = new Submit('submit', array('value' => 'Вход'));

        $this->add($email);
        $this->add($password);
        $this->add($submit);
    }

    public function getCsrf()
    {
        return $this->security->getToken();
    }
}