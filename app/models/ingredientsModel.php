<?php 

namespace App\Models\IngredientsModel;

function findAll(\PDO $connexion) {
    $sql = 
    "SELECT * FROM ingredients;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}