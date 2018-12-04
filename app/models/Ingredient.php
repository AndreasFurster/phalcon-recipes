<?php

class Ingredient extends \Phalcon\Mvc\Model
{
    public $Id;
    public $Name;

    public function initialize()
    {
        // Set table name
        $this->setSource("ingredient");

        $this->hasMany(
            'id',
            'RecipeIngredient',
            'ingredient_id'
        );
    }
}
