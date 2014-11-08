<?php

try {

    //Register an autoloader
    $loader = new \Phalcon\Loader();
    $loader->registerDirs(array(
        '../app/controllers/',
        '../app/models/'
    ))->register();

    //Create a DI
    $di = new Phalcon\DI\FactoryDefault();

    // Setup the database service
    $di->set('db', function(){

        switch ($_SERVER['HTTP_HOST']) {
            case "47hours.local":
                $password="root";
                $db_name = "panel";
                break;
            case "panel.local":
                $password="YNRhZmJUWUN";
                $db_name = "paneld_db";
                break;
            case "djaga.net":
                $password="LK434AaGLSg{}nqw41qove39t13";
                $db_name = "panel";
            default:
                $password="";
                break;
        }

        return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
            'host' => 'localhost',
            'dbanme' => $db_name,
            'username' => 'root',
            'password' => $password
        ));
    });

    //Setup the view component
    $di->set('view', function(){
        $view = new \Phalcon\Mvc\View();
        $view->setViewsDir('../app/views/');
        return $view;
    });

    //Setup a base URI so that all generated URIs include the "tutorial" folder
    $di->set('url', function(){
        $url = new \Phalcon\Mvc\Url();
        $url->setBaseUri('/panel/');
        return $url;
    });

    //Set up the flash service
    $di->set('flash', function() {
        $flash = new \Phalcon\Flash\Direct(array(
            'error' => 'alert alert-error',
            'success' => 'alert alert-success',
            'notice' => 'alert alert-info',
        ));
        return $flash;
    });

    //Handle the request
    $application = new \Phalcon\Mvc\Application($di);

    header('Content-Type: text/html; charset=utf-8');
    echo $application->handle()->getContent();

} catch(\Phalcon\Exception $e) {
    echo "PhalconException: ", $e->getMessage();
}