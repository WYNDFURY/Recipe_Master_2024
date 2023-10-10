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
        AVG(r.value) AS recipe_rating
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

function findOneById(\PDO $connexion, int $id = 1){
    $sql =
    "SELECT
        d.id AS recipe_id,
        d.name AS recipe_name,
        d.description AS recipe_description,
        u.name AS recipe_chef,
        d.prep_time AS recipe_time,
        AVG(r.value) AS recipe_rating,
        COUNT(c.id) AS recipe_comments
    FROM
        dishes d
    JOIN
        users u ON d.user_id = u.id
    LEFT JOIN
        comments c ON d.id = c.dish_id
    LEFT JOIN
        ratings r ON d.id = r.dish_id  
    WHERE
        d.id = :id
    GROUP BY
        d.id, d.name, d.description, u.name;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}


function featuredRecipe(\PDO $connexion, int $id = 1){
    $sql =
    "SELECT 
        *
    FROM (
    SELECT 
        d.id AS recipe_id, 
        d.name AS recipe_name, 
        d.description AS recipe_description,
        u.id AS user_id, 
        u.name AS user_name, 
        AVG(r.value) AS avg_rating, 
        COALESCE(comment_count, 0) AS comment_count
    FROM 
        dishes d
    LEFT JOIN 
        ratings r ON d.id = r.dish_id
    LEFT JOIN 
        users u ON d.user_id = u.id
    LEFT JOIN (
        SELECT dish_id, COUNT(id) AS comment_count
        FROM comments
        GROUP BY dish_id
    ) c ON d.id = c.dish_id
    GROUP BY 
        d.id
    HAVING 
        COUNT(r.dish_id) > 0
    ORDER BY 
        avg_rating DESC
    LIMIT 
        10
    ) AS top_10
    ORDER BY 
        RAND()
    LIMIT 
        1;";
    $rs = $connexion->prepare($sql);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function findAllPopulars(\PDO $connexion) {
    $sql = 
    "SELECT 
        AVG(r.value) AS recipe_rating, 
        d.name AS recipe_name,
        d.description AS recipe_description,
        d.id AS recipe_id,
        us.id AS user_id,
        us.name as recipe_chef,
        tod.id as category_id,
        tod.name as category_name,
        COALESCE(comment_count, 0) AS recipe_comment
    FROM 
        dishes d
    JOIN 
        types_of_dishes tod ON d.type_id = tod.id
    JOIN 
        users us ON d.user_id = us.id
    LEFT JOIN 
        ratings r ON r.dish_id = d.id
    LEFT JOIN (
        SELECT dish_id, COUNT(id) AS comment_count
        FROM comments
        GROUP BY dish_id
    ) c ON d.id = c.dish_id
    GROUP BY 
        d.id
    ORDER BY 
        AVG(r.value) DESC
    LIMIT 
        3;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllByUserId(\PDO $connexion, int $id)
{
    $sql = 
    "SELECT 
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
        d.created_at DESC";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();

    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findLast3ByUserId(\PDO $connexion, int $id)
{
    $sql = 
    "SELECT 
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
