<?php

// Controller to mangage recipes
class RecipesController extends ControllerBase
{

    // GET for overview of current recipes
    public function indexAction()
    {
        $this->view->recipes = Recipe::find();
    }

    // GET for viewing recipes
    public function viewAction($id){
        // Find recipe
        $recipe = Recipe::findFirstById($id);
        if (!$recipe) {
            $this->flash->error("recipe is niet (meer) gevonden");
            
            return $this->response->redirect('recipes');   
        }

        // Pass recipe and ingredients to view
        $this->view->recipe = $recipe;
        $this->view->recipe_ingredients = $recipe->recipeIngredient;
    }

    // GET for creating recipes
    // This function inmediatly creates an new recipe and redirects to it's edit page
    public function createAction()
    {
        $this->dispatcher->forward(
        [
            'controller' => 'recipes',
            'action'     => 'edit',
        ]);
        //return $this->response->redirect('recipes/edit/' . $recipe->id);   
    }
    
    // GET and POST for editing recipes
    public function editAction($id = null)
    {
        $recipe = Recipe::findFirstById($id);
        
        // Check recipe found
        if (!$recipe) {
            $recipe = new Recipe();
        }
        
        // Handle post
        if ($this->request->isPost()) {
            
            // We are modifying ingredients.
            if($this->request->getPost('save_recipe') === null) {
                // Add new recipe ingredient
                if($this->request->getPost("add_recipe_ingredient") !== null){
                    $recipe_ingredient = new RecipeIngredient();
                    $recipe_ingredient->recipe_id = $id;
                    $recipe_ingredient->ingredient_id = $this->request->getPost("recipe_ingredient_id");
                    $recipe_ingredient->amount = $this->request->getPost("recipe_ingredient_amount");
            
                    if(!$recipe_ingredient->save()) {
                        foreach ($recipe_ingredient->getMessages() as $message) {
                            $this->flashSession->error($message);
                        }
                    }               
                }

                // Delete existing recipe ingredient
                else if ($this->request->getPost("remove_recipe_ingredient") !== null){
                    $recipe_ingredient_id = $this->request->getPost("remove_recipe_ingredient");
                    $recipe_ingredient = RecipeIngredient::findFirstById($recipe_ingredient_id);

                    if (!$recipe_ingredient) {
                        $this->flash->error("recipe is niet (meer) gevonden");    
                    }
                    else{
                        if (!$recipe_ingredient->delete()) {            
                            foreach ($recipe_ingredient->getMessages() as $message) {
                                $this->flash->error($message);
                            }
                        }
                    }
                }
            }

            $recipe->title = $this->request->getPost("title");
            $recipe->subtitle = $this->request->getPost("subtitle");
            $recipe->image = $this->request->getPost("image");
            $recipe->instruction = $this->request->getPost("instruction");
            
            // Redirect to index if save is successfull
            if ($this->request->getPost('save_recipe') !== null && $recipe->save()) {
                return $this->response->redirect('/recipes/edit/' . $id);   
            }
            else {
                // Gather all error messages
                foreach ($recipe->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
            }
        }

        // Pass recipe and ingredients to view for default values 
        $this->view->recipe = $recipe;
        $this->view->recipe_ingredients = $recipe->recipeIngredient;

        // Only show ingredients that are not added to the recipe yet
        $this->view->ingredients = (object) array_filter(Ingredient::find()->toArray(), function ($ingridient) use (&$recipe)
        {
            return RecipeIngredient::findByIds($recipe->id, $ingridient['id']) === false;
        });
    }
    
    // GET for deleting recipes
    public function deleteAction($Id)
    {
        // Find recipe
        $recipe = Recipe::findFirstById($Id);
        if (!$recipe) {
            $this->flash->error("recipe is niet (meer) gevonden");
            
            return $this->response->redirect('recipes');   
        }
        
        // Delete it
        if (!$recipe->delete()) {            
            foreach ($recipe->getMessages() as $message) {
                $this->flash->error($message);
            }
        }
        else{
            $this->flash->success("recipe is verwijderd");
        }
        
        return $this->response->redirect('recipes');   
    }

}
