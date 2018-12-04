<?php

class RecipeIngredient extends \Phalcon\Mvc\Model
{
    public $id;
    public $recipe_id;
    public $ingredient_id;
    public $amount;

    public function initialize()
    {
        // Set table name
        $this->setSource("recipe_ingredient");

        // Link property recipe_id to recipe model
        $this->belongsTo(
            'recipe_id',
            'Recipe',
            'id'
        );

        // Link property ingredient_id to ingredient model
        $this->belongsTo(
            'ingredient_id',
            'Ingredient',
            'id'
        );
    }

    public static function findByIds($recipe_id, $ingredient_id){
        return self::findFirst([
            'conditions' => 'ingredient_id=:ingredient_id: AND recipe_id=:recipe_id:',
            'bind' => [ 'ingredient_id' => $ingredient_id, 'recipe_id' => $recipe_id],
        ]);
    }
}
