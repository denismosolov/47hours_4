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
        $request = $this->request->get();

        UserSurvies::addNewResult(
            $request['user_id'],
            $request['survey_id'],
            date("Y-m-d H:i:s"),
            date("Y-m-d H:i:s"),
            $request['is_passed']
        );
    }
}