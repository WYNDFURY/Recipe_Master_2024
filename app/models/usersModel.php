<?php

namespace App\Models\UsersModel;

function findOneByPseudo(\PDO $connexion, array $data)
{
    $sql = "SELECT *
            FROM users
            WHERE pseudo = :pseudo;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':pseudo', $data['pseudo'], \PDO::PARAM_STR);
    $rs->execute();

    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function findOneRandom(\PDO $connexion)
{
    $sql = "SELECT
            u.id AS user_id,
            u.name AS user_name,
            u.created_at AS user_creation_date,
            u.picture AS user_picture,
            COUNT(d.id) AS recipe_count
    FROM
        users u
    JOIN
        dishes d ON u.id = d.user_id
    WHERE
        (SELECT COUNT(*) FROM dishes WHERE user_id = u.id) > 0
    GROUP BY
        u.id
    ORDER BY
        RAND()
    LIMIT 1;";
    $rs = $connexion->prepare($sql);
    $rs->execute();

    return $rs->fetch(\PDO::FETCH_ASSOC);
}