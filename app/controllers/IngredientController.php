<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class IngredientController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for ingredient
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Ingredient', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "Id";

        $ingredient = Ingredient::find($parameters);
        if (count($ingredient) == 0) {
            $this->flash->notice("The search did not find any ingredient");

            $this->dispatcher->forward([
                "controller" => "ingredient",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $ingredient,
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
     * Edits a ingredient
     *
     * @param string $Id
     */
    public function editAction($Id)
    {
        if (!$this->request->isPost()) {

            $ingredient = Ingredient::findFirstById($Id);
            if (!$ingredient) {
                $this->flash->error("ingredient was not found");

                $this->dispatcher->forward([
                    'controller' => "ingredient",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->Id = $ingredient->Id;

            $this->tag->setDefault("Id", $ingredient->Id);
            $this->tag->setDefault("Name", $ingredient->Name);
            $this->tag->setDefault("Unit", $ingredient->Unit);
            
        }
    }

    /**
     * Creates a new ingredient
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "ingredient",
                'action' => 'index'
            ]);

            return;
        }

        $ingredient = new Ingredient();
        $ingredient->name = $this->request->getPost("Name");
        $ingredient->unit = $this->request->getPost("Unit");
        

        if (!$ingredient->save()) {
            foreach ($ingredient->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "ingredient",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("ingredient was created successfully");

        $this->dispatcher->forward([
            'controller' => "ingredient",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a ingredient edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "ingredient",
                'action' => 'index'
            ]);

            return;
        }

        $Id = $this->request->getPost("Id");
        $ingredient = Ingredient::findFirstById($Id);

        if (!$ingredient) {
            $this->flash->error("ingredient does not exist " . $Id);

            $this->dispatcher->forward([
                'controller' => "ingredient",
                'action' => 'index'
            ]);

            return;
        }

        $ingredient->name = $this->request->getPost("Name");
        $ingredient->unit = $this->request->getPost("Unit");
        

        if (!$ingredient->save()) {

            foreach ($ingredient->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "ingredient",
                'action' => 'edit',
                'params' => [$ingredient->Id]
            ]);

            return;
        }

        $this->flash->success("ingredient was updated successfully");

        $this->dispatcher->forward([
            'controller' => "ingredient",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a ingredient
     *
     * @param string $Id
     */
    public function deleteAction($Id)
    {
        $ingredient = Ingredient::findFirstById($Id);
        if (!$ingredient) {
            $this->flash->error("ingredient was not found");

            $this->dispatcher->forward([
                'controller' => "ingredient",
                'action' => 'index'
            ]);

            return;
        }

        if (!$ingredient->delete()) {

            foreach ($ingredient->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "ingredient",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("ingredient was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "ingredient",
            'action' => "index"
        ]);
    }

}
