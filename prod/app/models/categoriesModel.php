<?php 

namespace App\Models\CategoriesModel;

function findAll(\PDO $connexion) {
    $sql = 
    "SELECT * FROM types_of_dishes;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllByCategoryId(\PDO $connexion, int $id)
{
    $sql = 
    "SELECT 
        d.id AS recipe_id,
        d.name AS recipe_name,
        ROUND(AVG(r.value),2) AS recipe_rating,
        d.description AS recipe_description,
        t.name AS category_name
    FROM
        dishes d
    LEFT JOIN
        ratings r ON d.id = r.dish_id
    LEFT JOIN
        types_of_dishes t ON d.type_id = t.id
    WHERE
        d.type_id = :id
    GROUP BY
        d.id, d.name, d.description
    ORDER BY 
        d.id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();

    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}