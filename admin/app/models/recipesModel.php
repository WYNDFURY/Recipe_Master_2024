<?php 

namespace App\Models\RecipesModel;



function findAll(\PDO $connexion){
    $sql = 
    "SELECT
        d.id AS recipe_id,
        d.name AS recipe_name,
        d.description AS recipe_description,
        d.created_at AS recipe_date,
        tod.name AS recipe_category,
        u.name as recipe_chef,
        ROUND(AVG(r.value),2) AS recipe_rating
    FROM
        dishes d
    LEFT JOIN
        ratings r ON d.id = r.dish_id
    LEFT JOIN
        users u ON d.user_id = u.id  -- Corrected join condition
    LEFT JOIN
        types_of_dishes tod ON d.type_id = tod.id  -- Corrected join condition
    GROUP BY
        d.id, d.name, d.description, tod.name, u.name  -- Added missing column in GROUP BY
    ORDER BY
        d.id;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}



// DELETE FUNCTIONS

function deleteRecipe(\PDO $connexion, int $id) : bool
{
    $sql = "DELETE FROM dishes WHERE id = :id";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return $rs->execute();
}

function deleteDHIByRecipeId(\PDO $connexion, int $id)
{
    $sql = 
    "DELETE FROM 
        dishes_has_ingredients
    WHERE 
        dish_id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return $rs->execute();
}

function deleteRatingsByRecipeId(\PDO $connexion, int $id)
{
    $sql = 
    "DELETE FROM
        ratings
    WHERE 
        dish_id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return $rs->execute();
}

function deleteCommentsByRecipeId(\PDO $connexion, int $id)
{
    $sql = 
    "DELETE FROM
        comments
    WHERE 
        dish_id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return $rs->execute();
}



// CREATE FUNCTIONS

function createRecipe(\PDO $connexion, $data)
{
    $sql = "INSERT INTO dishes (name, description, type_id, user_id, created_at) VALUES (:name, :description, :category_id, :user_id, NOW())";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':user_id', $data['chef_id'], \PDO::PARAM_STR);
    $rs->bindValue(':category_id', $data['category_id'], \PDO::PARAM_STR);
    $rs->bindValue(':description', $data['description'], \PDO::PARAM_STR);
    
    return $rs->execute();
}


function addNewRecipeIngredients(\PDO $connexion, $ingredients)
{    
    $recipeId = $connexion->lastInsertId();
    $sql = "INSERT INTO dishes_has_ingredients (dish_id, ingredient_id, quantity) VALUES (:id, :new_ingredient_id, 0);";
    $rs = $connexion->prepare($sql);

    foreach ($ingredients AS $ingredientId) {
        $rs->bindValue(':new_ingredient_id', $ingredientId, \PDO::PARAM_INT);
        $rs->bindValue(':id', $recipeId, \PDO::PARAM_INT);
        $rs->execute();
    }
}





// UPDATE FUNCTIONS

function findOneById(\PDO $connexion, $id){
    $sql = 
    "SELECT
        d.id AS recipe_id,
        d.name AS recipe_name,
        d.description AS recipe_description,
        d.prep_time AS recipe_prep_time,
        d.type_id AS recipe_type_id,
        tod.name AS recipe_category,
        u.id AS chef_id,
        u.name AS recipe_chef
    FROM
        dishes d
    JOIN
        users u ON d.user_id = u.id
    JOIN
        types_of_dishes tod ON d.type_id = tod.id
    WHERE
        d.id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}



function addRecipeIngredients(\PDO $connexion, $id, $ingredients)
{    

    $sql = "INSERT INTO dishes_has_ingredients (dish_id, ingredient_id, quantity) VALUES (:id, :new_ingredient_id, 0);";
    $rs = $connexion->prepare($sql);

    foreach ($ingredients AS $ingredientId) {
        $rs->bindValue(':id', $id, \PDO::PARAM_INT);
        $rs->bindValue(':new_ingredient_id', $ingredientId, \PDO::PARAM_INT);
        $rs->execute();
    }
}
            


function updateRecipe(\PDO $connexion, $id, $data)
{
    $sql = 
    "UPDATE 
        dishes
    SET 
        name = :name,
        description = :description,
        user_id = :user_id,
        type_id = :category_id
    WHERE 
        id = :id;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id , \PDO::PARAM_INT);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':user_id', $data['chef_id'], \PDO::PARAM_STR);
    $rs->bindValue(':category_id', $data['category_id'], \PDO::PARAM_STR);
    $rs->bindValue(':description', $data['description'], \PDO::PARAM_STR);
    return $rs->execute();
}
