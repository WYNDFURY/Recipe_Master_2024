<?php

namespace App\Models\UsersModel;

function findAll(\PDO $connexion){
    $sql = 
    "SELECT
    u.id AS chef_id,
    u.name AS chef_name,
    u.picture AS chef_picture,
    u.created_at AS chef_creation_date,
    COUNT(d.id) AS chef_recipe_count
    FROM
        users u
    LEFT JOIN
        dishes d ON u.id = d.user_id
    GROUP BY
        u.id, u.name, u.picture, u.created_at
    ORDER BY
        u.id
    LIMIT
        9;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findOneById(\PDO $connexion, int $id = 1){
    $sql =
    "SELECT
        name AS chef_name,
        biography AS chef_biography,
        picture AS chef_picture
    FROM
        users
    WHERE
        id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function findOneByPseudo(\PDO $connexion, array $data)
{
    $sql = "SELECT *
            FROM users
            WHERE name = :name;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['user'], \PDO::PARAM_STR);
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