<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 11/8/14
 * Time: 4:21 PM
 */

class Users extends \Phalcon\Mvc\Model
{
    protected $id;
    protected $created_date;
    protected $is_active;
    protected $is_confirmed;
    protected $last_updated_date;
    protected $confirmation_code;
    protected $registration_code;
    protected $email;
    protected $phone_number;
    protected $password;

    public function initialize()
    {
        $this->setSource("users");
    }

    public function getId(){
        return $this->id;
    }

    public function getCreatedDate(){
        return $this->created_date;
    }

    public function getIsActive(){
        return $this->is_active;
    }

    public function getIsConfirmed(){
        return $this->is_confirmed;
    }

    public function getLastUpdatedDate(){
        return $this->last_updated_date;
    }

    public function getConfirmationCode(){
        return $this->confirmation_code;
    }

    public function getRegistrationCode(){
        return $this->registration_code;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPhoneNumber(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }


}