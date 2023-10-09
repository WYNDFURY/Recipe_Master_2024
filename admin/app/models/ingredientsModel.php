<?php 

namespace App\Models\IngredientsModel;

function findAll(\PDO $connexion) {
    $sql = 
    "SELECT * FROM ingredients;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllByIngredientId(\PDO $connexion, int $id)
{
    $sql = 
    "SELECT
        d.id AS recipe_id,
        d.name AS recipe_name,
        AVG(r.value) AS recipe_rating,
        d.description AS recipe_description,
        i.name AS ingredient_name
    FROM
        dishes d
    LEFT JOIN
        ratings r ON d.id = r.dish_id
    LEFT JOIN
        types_of_dishes t ON d.type_id = t.id
    LEFT JOIN
        dishes_has_ingredients di ON d.id = di.dish_id
    LEFT JOIN
        ingredients i ON di.ingredient_id = i.id
    WHERE
        i.id = :id
    GROUP BY
        d.id, d.name, d.description, t.name, i.name
    ORDER BY
        d.id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();

    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllIngredientsByRecipeId(\PDO $connexion, int $id){
    $sql = 
    "SELECT
        i.id AS ingredient_id,
        i.name AS ingredient_name,
        i.unit AS ingredient_unit,
        dhi.quantity AS ingredient_quantity
    FROM
        dishes_has_ingredients dhi
    JOIN
        ingredients i ON dhi.ingredient_id = i.id
    WHERE
        dhi.dish_id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}




