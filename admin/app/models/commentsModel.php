<?php 

namespace App\Models\CommentsModel;


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