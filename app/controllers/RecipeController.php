<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class RecipeController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for recipe
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Recipe', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "Id";

        $recipe = Recipe::find($parameters);
        if (count($recipe) == 0) {
            $this->flash->notice("The search did not find any recipe");

            $this->dispatcher->forward([
                "controller" => "recipe",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $recipe,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a recipe
     *
     * @param string $Id
     */
    public function editAction($Id)
    {
        if (!$this->request->isPost()) {

            $recipe = Recipe::findFirstById($Id);
            if (!$recipe) {
                $this->flash->error("recipe was not found");

                $this->dispatcher->forward([
                    'controller' => "recipe",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->Id = $recipe->Id;

            $this->tag->setDefault("Id", $recipe->Id);
            $this->tag->setDefault("Image", $recipe->Image);
            $this->tag->setDefault("Name", $recipe->Name);
            $this->tag->setDefault("Instruction", $recipe->Instruction);
            
        }
    }

    /**
     * Creates a new recipe
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "recipe",
                'action' => 'index'
            ]);

            return;
        }

        $recipe = new Recipe();
        $recipe->image = $this->request->getPost("Image");
        $recipe->name = $this->request->getPost("Name");
        $recipe->instruction = $this->request->getPost("Instruction");
        

        if (!$recipe->save()) {
            foreach ($recipe->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "recipe",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("recipe was created successfully");

        $this->dispatcher->forward([
            'controller' => "recipe",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a recipe edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "recipe",
                'action' => 'index'
            ]);

            return;
        }

        $Id = $this->request->getPost("Id");
        $recipe = Recipe::findFirstById($Id);

        if (!$recipe) {
            $this->flash->error("recipe does not exist " . $Id);

            $this->dispatcher->forward([
                'controller' => "recipe",
                'action' => 'index'
            ]);

            return;
        }

        $recipe->image = $this->request->getPost("Image");
        $recipe->name = $this->request->getPost("Name");
        $recipe->instruction = $this->request->getPost("Instruction");
        

        if (!$recipe->save()) {

            foreach ($recipe->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "recipe",
                'action' => 'edit',
                'params' => [$recipe->Id]
            ]);

            return;
        }

        $this->flash->success("recipe was updated successfully");

        $this->dispatcher->forward([
            'controller' => "recipe",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a recipe
     *
     * @param string $Id
     */
    public function deleteAction($Id)
    {
        $recipe = Recipe::findFirstById($Id);
        if (!$recipe) {
            $this->flash->error("recipe was not found");

            $this->dispatcher->forward([
                'controller' => "recipe",
                'action' => 'index'
            ]);

            return;
        }

        if (!$recipe->delete()) {

            foreach ($recipe->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "recipe",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("recipe was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "recipe",
            'action' => "index"
        ]);
    }

}
