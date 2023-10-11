<?php 

namespace App\Models\CategoriesModel;

function findAll(\PDO $connexion) {
    $sql = 
    "SELECT * FROM types_of_dishes;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function updateCategory(\PDO $connexion, int $id, string $name, string $description) {
    $sql = "UPDATE types_of_dishes
            SET name = :name,
                description = :description
            WHERE id = :id;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->bindValue(':name', $name, \PDO::PARAM_STR);
    $rs->bindValue(':description', $description, \PDO::PARAM_STR);
    return $rs->execute();
}

function deleteCategory(\PDO $connexion, int $id) : bool
{
    $sql = "DELETE FROM types_of_dishes
            WHERE id  = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_STR);
    return $rs->execute();
}

function deleteCommentsByCategoryId(\PDO $connexion, int $id) : bool
{
    $sql = 
    "DELETE c
    FROM comments c
    JOIN dishes d ON c.dish_id = d.id
    WHERE d.type_id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_STR);
    return $rs->execute();
}

function deleteDHIByCategoryId(\PDO $connexion, int $id) : bool
{
    $sql = 
    "DELETE dhi FROM dishes_has_ingredients dhi
    JOIN dishes d ON dhi.dish_id = d.id
    WHERE d.type_id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_STR);
    return $rs->execute();
}

function deleteRatingsByCategoryId(\PDO $connexion, int $id) : bool
{
    $sql = 
    "DELETE r
    FROM ratings r
    JOIN dishes d ON r.dish_id = d.id
    WHERE d.type_id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_STR);
    return $rs->execute();
}

function deleteDishesByCategoryId(\PDO $connexion, int $id) : bool
{
    $sql = "DELETE FROM dishes
            WHERE type_id  = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_STR);
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