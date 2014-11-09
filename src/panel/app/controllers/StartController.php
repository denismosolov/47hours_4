<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StartController
 *
 * @author denis
 */
class StartController extends \Phalcon\Mvc\Controller 
{
    //put your code here
    public function IndexAction(){
        // for debug
        // @todo: remove
//        $this->session->set('user_id', '1');
//        $this->session->remove('active_users_surveys_id');
        // end debug
        
        if ($this->session->has("curr_user")) {
            //Retrieve user
            $user = $this->session->get("curr_user");
        } else {
            throw new Exception('An error has accured #3 Unauthorized');
        }
        
//        if (! $this->session->has('user_id')) {
//            // only authorized users are allowed
//            throw new Exception('An error has accured #3');
//        }
        
        if ($this->session->has('active_users_surveys_id')) {
            // we don't allow users to take two surveys at the same session
            throw new Exception('An error has accured #4');
        }
        
        $request = $this->request->get();
        
        if (! isset($request['survey_id'])) {
            // survey_id is required
            throw new Exception('An error has occured #5');
        }
        
        // befo it redirect to survey,
        // it tracks survey_id, user_id and start_date 
        // is_passed, completed_date will be added later
        $surveys = UsersSurveys::find(array(
            'survey_id' => $request['survey_id'],
            'user_id' => $user->getId()
        ));
        if (count($surveys)) {
            $this->response->redirect('start/prohibited');
            return;
        }
        
        $UsersSurveys = new UsersSurveys();
        $UsersSurveys->setUserId($user->getId());
        $UsersSurveys->setSurveyId($request['survey_id']);
        $UsersSurveys->setStartDate(date("Y-m-d H:i:s"));
        if($UsersSurveys->save()) {
            // to let the system know the user is answering survey_id
            $this->session->set('active_users_surveys_id', '1');
            
            $response = new \Phalcon\Http\Response();
            // @todo: insert survey base url from db
            $response->redirect('http://www.surveygizmo.com/s3/1884090/screening?user_id=' . $user->getId() . '&survey_id=' . $request['survey_id'], true, 302);
            return $response;
        } else {
            throw new Exception('An error has occured #1');
        }
    }
    
    public function ProhibitedAction() {
        
    }
}
