<?php 

namespace App\Models\RecipesModel;

function featuredRecipe(){

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