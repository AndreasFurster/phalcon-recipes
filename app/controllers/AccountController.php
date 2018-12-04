<?php

class AccountController extends ControllerBase
{
    public function loginAction() {
        if ($this->request->isPost()) {
            $email = $this->request->getPost("email");
            $password = $this->request->getPost("password");

            // Check fields submitted
            if(!$email || !$password) {
                $this->flashSession->error("Niet alle velden zijn correct ingevuld");
                return;
            }

            // Validate user
            $user = User::findByEmailAndPassword($email, $password);
            if(!$user) {
                $this->flashSession->error("Gebruikersnaam en/of wachtwoord is incorrect");
                return;
            }

            // Set session details in $_SESSION            
            $this->session->set('authenticated', true);
            $this->session->set('email', $email);

            return $this->response->redirect('/');  
        }
    }

    public function logoutAction() {
        parent::checkAuthentication();

        // Remove authentication info from session
        $this->session->set('authenticated', false);
        $this->session->set('email', null);

        return $this->response->redirect('/');  
    }
}