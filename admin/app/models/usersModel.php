<?php

namespace App\Models\UsersModel;

function findAll(\PDO $connexion) {
    $sql = 
    "SELECT 
        u.id AS user_id,
        u.name AS user_name,
        u.email AS user_email,
        u.biography AS user_bio,
        u.picture AS user_picture,
        u.created_at AS user_date
    FROM 
        users u;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function getUserIdByUsername(\PDO $connexion, string $name){
    $sql = "SELECT id
    FROM users
    WHERE name = :name;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $name, \PDO::PARAM_STR);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function updateCategory(\PDO $connexion, int $id, string $name, string $description) {
    $sql = "UPDATE types_of_dishes
            SET name = :name,
                description = :description
            WHERE id = :id";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->bindValue(':name', $name, \PDO::PARAM_STR);
    $rs->bindValue(':description', $description, \PDO::PARAM_STR);
    return $rs->execute();
}

function deleteCategory(\PDO $connexion, int $id) {
    $sql = "DELETE FROM types_of_dishes WHERE id = :id";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return $rs->execute();
}

function createCategory(\PDO $connexion, $name, $description) {
    $sql = "INSERT INTO types_of_dishes (name, description, created_at) VALUES (:name, :description, NOW())";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $name, \PDO::PARAM_STR);
    $rs->bindValue(':description', $description, \PDO::PARAM_STR);
    $rs->execute();
    return $connexion;
}