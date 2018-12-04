<?php

// Controller to mangage ingredients
class IngredientsController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();

        // This whole controller is only accessable if the user is authenticated
        parent::checkAuthentication();
    }
    
    // GET for overview of current ingredients
    public function indexAction()
    {
        $this->view->ingredients = Ingredient::find();
    }

    // GET and POST for creating ingriedients
    public function createAction()
    {
        if ($this->request->isPost()) {
            
            $ingredient = new Ingredient();
            $ingredient->name = $this->request->getPost("name");

            if (!$ingredient->save()) {
                foreach ($ingredient->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                
                return;
            }

            $this->flashSession->success("Ingredient is succesvol aangemaakt");

            return $this->response->redirect('ingredients');   
        }
    }
    
    // GET and POST for editing ingriedients
    public function editAction($id)
    {
        // Always get ingredient by id from url
        $ingredient = Ingredient::findFirstById($id);
        
        // Check ingredient found
        if (!$ingredient) {
            $this->flashSession->error("Ingredient is niet (meer) gevonden");    
            return $this->response->redirect('ingredients');   
        }
        
        // Handle post
        if ($this->request->isPost()) {
            $ingredient->name = $this->request->getPost("name");
            
            // Redirect to index if save is successfull
            if ($ingredient->save()) {
                return $this->response->redirect('ingredients');   
            }
            else {
                // Gather all error messages
                foreach ($ingredient->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
            }
        }
        
        // Pass ingredient to view for default values 
        $this->view->ingredient = $ingredient;
    }
    
    // GET for deleting ingredients
    public function deleteAction($id)
    {
        // Find ingredient
        $ingredient = Ingredient::findFirstById($id);
        if (!$ingredient) {
            $this->flashSession->error("Ingredient is niet (meer) gevonden");
            
            return $this->response->redirect('ingredients');   
        }
        
        // Delete it
        if (!$ingredient->delete()) {            
            foreach ($ingredient->getMessages() as $message) {
                $this->flashSession->error($message);
            }
        }
        else{
            $this->flashSession->success("Ingredient is verwijderd");
        }
        
        return $this->response->redirect('ingredients');   
    }

}
