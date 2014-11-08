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

class RegistrationForm extends Form
{
    public function initialize()
    {
        $email = new Text("email");
        $email->addValidator(new PresenceOf(array(
            'message' => 'Это обязательное поле'
        )));

        $submit = new Submit('submit', array('value' => 'Регистрация'));

        $this->add($email);
        $this->add($submit);
    }

    public function getCsrf()
    {
        return $this->security->getToken();
    }
}