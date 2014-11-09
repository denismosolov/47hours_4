<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CabinetController
 *
 * @author denis
 */
class CabinetController extends \Phalcon\Mvc\Controller
{
    public function indexAction() {
        // for debug
        // @todo: remove
//        $this->session->set('user_id', '1');
        // end debug
        
        if ($this->session->has("curr_user")) {
            //Retrieve user
            $user = $this->session->get("curr_user");
        } else {
            throw new Exception('Unauthorized');
        }
        
        // @todo: check how many respondents asked, is_opened
        // @todo refactoring!!
        $InvitedUsers = InvitedUsers::find(array(
            'user_id' => $user->getId()
        ));
        $open_surveys = array();
        $my_surveys = array();
        if (count($InvitedUsers)) {
            foreach ($InvitedUsers as $row) {
                $sid = $row->getSurveyId();
                $US = UsersSurveys::findFirst(array(
                    'user_id' => $user->getId(),
                    'survey_id' => $sid
                ));
                if ($US) {
                    $my_surveys[] = Surveys::findFirst($sid);
                } else {
                    $open_surveys[] = Surveys::findFirst($sid);
                }
            }
        } else {
            $this->view->open_survey_ids = array();
        }
        $this->view->setVar('open_surveys', $open_surveys);
        $this->view->setVar('my_surveys', $my_surveys);
    }
}
