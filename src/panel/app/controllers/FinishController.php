<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 11/8/14
 * Time: 3:09 PM
 */

class FinishController extends \Phalcon\Mvc\Controller
{
    public function IndexAction() {
        
        if(! $this->session->has('user_id')) {
            // user have to be authorized
            throw new Exception('An error has occured #1');
        }
        if (! $this->session->has('active_users_surveys_id')) {
            // see start controller
            // @todo: it might be checter, we should add info to cheaters log
            // it means the user have started this survey
            throw new Exception('An error has occured #2');
        }
        
        $request = $this->request->get();
        
        if (! isset($request['survey_id'])) {
            throw new Exception('An error has occured #3');
        }
        
        $UsersSurveys = UsersSurveys::findFirst(array('user_id' => $this->session->get('user_id'), 'survey_id' => $request['survey_id'], 'completed_date is null'));
        
        if (! $UsersSurveys) {
            // @todo: probably cheater deteced, should log
            // it might help in resolving cheater in the future
            throw new Exception('An error has occured #5');
        }
        
        $UsersSurveys->setPassed(isset($request['is_passed']) ? '1' : '0');
        $UsersSurveys->setCompletedDate(date("Y-m-d H:i:s"));
        $this->session->remove('active_users_surveys_id');
        if($UsersSurveys->save()) {
            // @todo: implement another type of redirect
            // this one is awful
            $this->response->redirect('/cabinet/index', true);
            $this->view->disable();
        } else {
            throw new Exception('An error has occured #6');
        }
    }
}