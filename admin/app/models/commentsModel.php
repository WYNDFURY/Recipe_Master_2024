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

