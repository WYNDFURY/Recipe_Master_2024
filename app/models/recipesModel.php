<?php 

namespace App\Models\RecipesModel;

function findAll(\PDO $connexion){
    $sql = 
    "SELECT
        d.id AS recipe_id,
        d.name AS recipe_name,
        d.description AS recipe_description,
        AVG(r.value) AS avg_rating
    FROM
        dishes d
    LEFT JOIN
        ratings r ON d.id = r.dish_id
    GROUP BY
        d.id, d.name, d.description
    ORDER BY
        d.id;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function featuredRecipe(\PDO $connexion, int $id = 1){
    $sql ="SELECT *
    FROM (
        SELECT d.id AS dish_id, d.name AS dish_name, d.description AS dish_description,
               u.id AS user_id, u.name AS user_name, 
               AVG(r.value) AS avg_rating, 
               COUNT(c.id) AS comment_count
        FROM dishes d
        LEFT JOIN ratings r ON d.id = r.dish_id
        LEFT JOIN users u ON d.user_id = u.id
        LEFT JOIN comments c ON d.id = c.dish_id
        GROUP BY d.id
        HAVING COUNT(r.dish_id) > 0
        ORDER BY avg_rating DESC
        LIMIT 10
    ) AS top_10
    ORDER BY RAND()
    LIMIT 1;
    ";
    $rs = $connexion->prepare($sql);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function findAllPopulars(\PDO $connexion) {
    $sql = 
    "SELECT AVG(r.value), 
            dsh.*, 
            us.id AS usersID,
            us.name as username,
            tod.id as categoryID,
            tod.name as typeName
    FROM dishes dsh
    JOIN types_of_dishes tod ON dsh.type_id = tod.id
    JOIN users us ON dsh.user_id = us.id
    LEFT JOIN ratings r ON r.dish_id = dsh.id
    GROUP BY dsh.id
    ORDER BY AVG(r.value) DESC
    LIMIT 3;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllByUserId(\PDO $connexion, int $id)
{
    $sql = "SELECT
    d.id AS recipe_id,
    d.name AS recipe_name,
    d.description AS recipe_description,
    AVG(r.value) AS recipe_avg_rating
FROM
    dishes d
LEFT JOIN
    ratings r ON d.id = r.dish_id
WHERE
    d.user_id = :id
GROUP BY
    d.id, d.name, d.description 
ORDER BY
    d.created_at DESC
LIMIT 3;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();

    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
