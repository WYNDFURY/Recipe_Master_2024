<?php 

namespace App\Models\RatingsModel;

function findAll(\PDO $connexion) {
    $sql = 
    "SELECT
        r.user_id AS rating_user_id,
        r.dish_id AS rating_recipe_id,
        r.value AS rating_value,
        r.created_at AS rating_date,
        u.name AS rating_user_name,
        d.name AS rating_recipe_name
    FROM
        ratings r
    JOIN
        users u ON r.user_id = u.id
    JOIN
        dishes d ON r.dish_id = d.id;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
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