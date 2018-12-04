<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->view->authenticated = $this->session->get('authenticated');

        if($this->view->authenticated){
            $this->view->email = $this->session->get('email');
        }
    }

    public function checkAuthentication()
    {
        // Check if user is authenticated
        if($this->view->authenticated){
            return;
        }

        $this->flashSession->error("U heeft geen toegang tot deze pagina");
        return $this->response->redirect('/');   
    }

}
