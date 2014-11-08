<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 11/8/14
 * Time: 3:09 PM
 */

class IndexController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
        header('Content-Type: text/html; charset=utf-8');
    }
}