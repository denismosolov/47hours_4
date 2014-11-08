<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 11/8/14
 * Time: 3:09 PM
 */

class FinishController extends \Phalcon\Mvc\Controller
{
    public function IndexAction(){

        //Create a DI
        $di = new Phalcon\DI\FactoryDefault();

        switch ($_SERVER['HTTP_HOST']) {
            case "47hours.local":
                $password="root";
                break;
            case "panel.local":
                $password="YNRhZmJUWUN";
                break;
            case "djaga.net":
                $password="LK434AaGLSg{}nqw41qove39t13";
            default:
                $password="";
                break;
        }

        // Setup the database service
        $di->set('db', function(){
            return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
                'host' => 'localhost',
                'dbanme' => 'paneld_db',
                'username' => 'root',
                'password' => $password
            ));
        });

        echo "234";
        exit;

        $request = $this->request->get();
        SurveyResult::addNewResult(
            $request['user_id'],
            $request['survey_id'],
            date("Y-m-d H:i:s"),
            date("Y-m-d H:i:s"),
            $request['is_passed']
        );

        


    }
}