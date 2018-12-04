<?php

class Recipe extends \Phalcon\Mvc\Model
{
    public $id;
    public $image;
    public $title;
    public $subtitle;
    public $instruction;

    public function initialize()
    {
        // Set table name
        $this->setSource("recipe");

        $this->hasMany(
            'id',
            'RecipeIngredient',
            'recipe_id'
        );
    }

}
