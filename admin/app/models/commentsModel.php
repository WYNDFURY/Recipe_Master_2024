<?php 

namespace App\Models\CommentsModel;

function findAll(\PDO $connexion) {
    $sql = 
    "SELECT 
        c.id AS comment_id, 
        c.created_at AS comment_date,
        c.content AS comment_content,
        u.id AS user_id,
        u.name AS user_name,
        d.id AS dish_id,
        d.name AS dish_name
     FROM 
        comments c
    LEFT JOIN 
        users u ON c.user_id = u.id
    LEFT JOIN
        dishes d ON c.dish_id = d.id;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllByRecipeId(\PDO $connexion, int $id)
{
    $sql = 
    "SELECT
        c.id AS comment_id,
        c.content AS comment_content,
        c.created_at AS comment_date,
        u.name AS comment_user,
        u.picture AS comment_user_picture
    FROM
        comments c
    JOIN
        users u ON c.user_id = u.id
    WHERE
        c.dish_id = :id
    ORDER BY
        c.created_at DESC;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();

    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}